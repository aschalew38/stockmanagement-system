<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Stock;
use App\Models\Sales;

class AccountController extends Controller
 {
public function index()
    {
       //return view('login');
        User::get()->each(function ($user) {
    $user->password = bcrypt($user->password);
    $user->save();
});
    }

    public function customLogin(Request $request)
    {
       $validator =  $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
            //Session::set('firstname', Auth()->user()->fname);
            session()->put('firstname', Auth()->user()->fname);
            session()->put('middlename', Auth()->user()->mname);
            session()->put('email', Auth()->user()->email);
            //$firstname_session =  Auth()->user()->fname;
            //$request->session()->put('firstname', Auth()->user()->fname);
             //session(['firstname' => Auth()->user()->fname]);
            //Session::set('middlename', Auth()->user()->mname);
                if(Auth()->user()->role == "admin") {
                    return redirect()->intended('admin-dashboard')
                                ->withSuccess('Signed in');
                }
                else if(Auth()->user()->role == "purchaser")
                {
                 return redirect()->intended('stock-dashboard')
                        ->withSuccess('Signed in');  
                }
             else if(Auth()->user()->role == "sales")
                {
                 return redirect()->intended('sales-dashboard')
                        ->withSuccess('Signed in');  
                }
        }
        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }

    public function customLoginJobs(Request $request)
    {
       $validator =  $request->validate([
            'phonenumber' => 'required',
            'password' => 'required',
        ]);
   
    
        $credentials = $request->only('phonenumber', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('jobs-dashboard')
                        ->withSuccess('Signed in');
        }
        $validator['emailPassword'] = 'Phonenumber or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }

/*    public function registration()
    {
        return view('auth.registration');
    }*/

    /** login page code customRegistration*/
    public function customRegistration(Request $request)
    {  
          $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    public function customRegistrationjobs(Request $request)
    {  
        $user = new User();
         $request->validate([
            'phonenumber' => 'required', 
            'fname' => 'required', 
            'mname' => 'required',
            'email' => 'required',
            'password' => 'required', 
            'role' => 'required',
            'password2' => 'required'
        ]);
        if($request->password != $request->password2)
        { 
            $validator['emailPassword'] = 'Password doesn\'t match';
           return redirect("create-account-admin")->withErrors($validator);  
        }else{
            
            $user->email = $request->email;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
            if($user->save())
            {
             return redirect()->back()->with(['success'=>'Account successfully created']);   
            }else{
                return redirect("create-account-admin")->withErrors($validator);
            }
        }
           
    }
    public function create(array $data2)
    {
       User::create([
        'email' => $data2['email'],
         'fname' => $data2['fname'],
          'mname' => $data2['mname'],
        'phonenumber' => $data2['phonenumber'],  
        'role' => $data2['role'],
        'password' => Hash::make($data2['password'])
      ]);
         return redirect()->back()->withSuccess('Account created');
    }    
public function createaccountview()
{
              $current_date = date('Y-m-d');         
             $credit = Sales::where('sells_type','=','credit')
             ->whereDate('credit_return_date', '<', $current_date)
             ->get();
            $debit = Stock::where('purchase_type','=','credit')
            ->whereDate('debit_return_date', '<', $current_date)
            ->get();
            $credit_count=$credit->count();
            $debit_count = $debit->count();
            $total_notification = $credit_count+$debit_count;
    
    return view('create_account',['credit_count'=>
        $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
    
     public function update_password(Request $request)
    {           
     
     $request->validate([
                'email' => 'required',
                'password' => 'required',
                'newpassword1' => 'required',
                'newpassword2' => 'required',
            ]);
          $user = User::where('email', $request->email)->first();
           if (! $user || ! Hash::check($request->password, $user->password))
            {
             return redirect()->back()->withErrors('error', 'invalid credentials');   
            }else{
               
      
            $user->password = Hash::make($request->newpassword1);
            $user->save();
    
            return redirect()->back()->with('success', 'Password updated'); 
            }
    }
    public function return_change_passwd_view()
    {

       $current_date = date('Y-m-d');         
         $credit = Sales::where('sells_type','=','credit')
         ->whereDate('credit_return_date', '<', $current_date)
         ->get();
        $debit = Stock::where('purchase_type','=','credit')
        ->whereDate('debit_return_date', '<', $current_date)
        ->get();
        $credit_count=$credit->count();
        $debit_count = $debit->count();
        $total_notification = $credit_count+$debit_count;
            
            
     return view('changepassword',['credit_count'=>$credit_count,'debit_count'=>$debit_count,
        'total_notification'=>$total_notification]);
    }
        
    



    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        session()->flush();
        Auth::logout();
  
        return Redirect('login');
    }
    public function viewaccount()
    {
        $current_date = date('Y-m-d');         
             $credit = Sales::where('sells_type','=','credit')
             ->whereDate('credit_return_date', '<', $current_date)
             ->get();
            $debit = Stock::where('purchase_type','=','credit')
            ->whereDate('debit_return_date', '<', $current_date)
            ->get();
            $credit_count=$credit->count();
            $debit_count = $debit->count();
            $total_notification = $credit_count+$debit_count;
            $data = User::get();
        
        return view('viewaccount',['post'=>$data,'credit_count'=>
        $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
    }
}
    
    
    
    
    