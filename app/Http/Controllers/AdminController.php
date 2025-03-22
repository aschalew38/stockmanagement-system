<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use Hash;*/
use Illuminate\Support\Facades\Session;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Sales;
use App\Models\StockName;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Credit;
use App\Models\Unit;
use App\Models\Order;
use App\Models\Store;
use App\Models\User;
class AdminController extends Controller
 {
     public function recordStock_view()
     {
         $current_date = date('Y-m-d');         
         $credit = Sales::where('sells_type','=','credit')
         ->whereDate('credit_return_date', '<', $current_date)
         ->get();
        $debit = Stock::where('purchase_type','=','credit')
        ->whereDate('debit_return_date', '<', $current_date)
        ->get();
         $data = StockName::orderBy('name','asc')->get();
         $data2 = Supplier::orderBy('fullname','asc')->get();
         $data3 = Unit::orderBy('name','asc')->get();

        $data4 = Store::orderBy('storename','asc')->get();
        $credit_count=$credit->count();
        $debit_count = $debit->count();
        $total_notification = $credit_count+$debit_count;

        return view('register_stock_admin',['post'=>$data,'supplier'=>$data2,'unit'=>$data3,'store'=>$data4,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
     }
     public function record_damage_()
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
        $data = StockName::orderBy('name','asc')->get();
               return view('register_damage_admin',['credit_count'=>
    $credit_count,'post'=>$data,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);  
     }
     public function record_cashout_()
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
       return view('register_cashout_admin',['credit_count'=>
        $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]); 
     }
       public function record_cashout_func(Request $request)
    {
         
        $sales = new Sales();
        $sales->stockname	=  $request->name;
        $sales->unit_buying_price = 0.0;
        $sales->unit_selling_price= 0;
        $sales->total_selling_price=  0.0;
        $sales->customername= $request->name;
        $sales->phonenumber= "null";
        $sales->sells_type="null";
        $sales->remark= $request->remark;
       $sales->profit=0.0 - $request->totalcash;
	
              if($sales->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Cashout recorded successfully.']); 
           }
     }
         
     
      public function recordStockName(Request $request)
  {
        $stocknames = new StockName();
    
        $request->validate([ 'stockname' => 'required']);  
        $stocknames->name = $request->stockname;
         if($stocknames->save())
         {
         return redirect()->back()
             ->with(['success' => 'Registered successfully.']);   
    
        }  
  }
  public function record_storename_view()
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

        return view('register_store_name_admin',['credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);  
  }
   public function usermanualview()
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
         return view('usermanual_admin',['credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);  
   }
       
   
    public function record_storename_save(Request $request)
  {
         $store = new Store();
    
        $request->validate([ 'storename' => 'required']);  
        $store->storename = $request->storename;
         if($store->save())
         {
         return redirect()->back()
             ->with(['success' => 'Registered successfully.']);   
    
        }   
  }
  public function record_damage_func(Request $request)
  {
         
        $sales = new Sales();
        $sales->stockname	=  $request->stockname;
        $sales->quantity = $request->quantity;
        $sales->unit_buying_price =  $request->buyingprice;
        $sales->unit_selling_price= 0;
        $sales->total_selling_price=  0.0;
        $sales->customername= "null";
        $sales->phonenumber= "null";
        $sales->sells_type="null";
        $sales->remark= $request->remark;
       $sales->profit=0.0 -  $request->totalbuyingprice;
	
              if($sales->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Damage recorded successfully.']); 
           }
  }
      
  
    public function record_unit_name_view()
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
        
        return view('register_unit_name_admin',['credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);  
  }
   
    public function record_unit_name_save(Request $request)
  {
          $unit = new Unit();
        $request->validate([ 'unitname' => 'required']);  
        $unit->name = $request->unitname;
         if($unit->save())
         {
         return redirect()->back()
             ->with(['success' => 'Registered successfully.']);   
    
        }   
  }

    public function recordStock(Request $request)
    {
    
    $stock = new Stock();

     $request->validate([
            'stockname' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'supplier' => 'required',
            'row' => 'required',
            'column' => 'required',
            'purchasetype'=> 'required',
             'store'=> 'required'
        ]);

    $stock->name = $request->stockname;
    $stock->quantity = $request->quantity;
    $stock->beginingbalance= ($request->quantity)*($request->price);
    $stock->endbalance= ($request->quantity)*($request->price);
    $stock->endquantity= $request->quantity;
    $stock->unit = $request->unit;
    $stock->supplier_fullname = $request->supplier;
    $stock->description = $request->remark;
    $stock->price = $request->price;
    $stock->purchase_type = $request->purchasetype;
    $stock->location = $request->row ." ".$request->column ;
    $stock->storename = $request->store;

    if($request->purchasetype == "credit")
    {
      $credit = new Credit();  
       $credit->stockname = $request->stockname;
       $credit->stock_quantity = $request->quantity;
       $credit->cost = ($request->quantity)*($request->price);
       $credit->unit = $request->unit;
       $credit->take = 1;
       $credit->customer_name = $request->supplier;
       $credit->save();
    }
    if($stock->save()){
        //return true;
     return redirect()->back()
                         ->with(['success' => 'Registered successfully.']);   

    }

}
public function recordsupplier(Request $request)
{
     $supplier = new Supplier();

     $request->validate([
            'suppliername' => 'required',
            'phonenumber' => 'required',
            'product' => 'required',
            'city' => 'required',
        ]);

    $supplier->fullname = $request->suppliername;
    $supplier->product = $request->product;
    $supplier->phonenumber= $request->phonenumber;
    $supplier->city= $request->city;
    
    if($supplier->save()){
        //return true;
     return redirect()->back()
                         ->with(['success' => 'Registered successfully.']);   

    }   
}
public function view_supplers()
{
 
    $data = Supplier::orderBy('created_at','desc')->get();
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
    return view('viewsuppliers_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function deletesupplier($id)
{
 $data = Supplier::find($id);  

 if($data->delete())
    {
      return redirect()->back()
                         ->with(['success' => 'Deleted successfully.']);  
    }
}
public function updatesupplier($id)
{
         $data = Supplier::find($id);
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
         
 return view('updatesupplier_admin',['post'=>$data
,'credit_count'=>$credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function updatesupplier_save(Request $request)
{
    $request->validate([
            'id' => 'required',
            'suppliername' => 'required',
            'phonenumber' => 'required',
            'product' => 'required',
            'city' => 'required'
        ]);
        $data = Supplier::find($request->id);
          $data->fullname=$request->suppliername;
          $data->phonenumber=$request->phonenumber;
          $data->product=$request->product;
          $data->city=$request->city;

          if($data->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Updated successfully.']); 
           } 
}
public function view_sell_stock()
{
    $data = Stock::orderBy('created_at','desc')->get();
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
    return view('sell_stock_view_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);    
}
public function view_stock()
{
 
    $data = Stock::orderBy('created_at','desc')->get();
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
    return view('viewstock_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function view_stock_sales()
{
   
    $data = Stock::orderBy('created_at','desc')->get();
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
    return view('viewstock_sales_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);  
}
public function deletestock($id)
{
 $data = Stock::find($id);  

 if($data->delete())
    {
      return redirect()->back()
                         ->with(['success' => 'Deleted successfully.']);  
    }
}

public function updatestock($id)
{
         $data = Stock::find($id);  
         $data1 = StockName::orderBy('name','asc')->get();
         $data2 = Supplier::orderBy('fullname','asc')->get();
         $data3 = Unit::orderBy('name','asc')->get();
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
 return view('updatestock_admin',['post'=>$data,'stockname'=>$data1,'supplier'=>$data2,'unit'=>$data3,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}

public function sellstock($id)
{
         $data = Stock::find($id); 
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
 return view('sell_stock_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function sell_save(Request $request)
    {
            $request->validate([
            'quantity' => 'required',
            'price' => 'required',
            'buyerfullname' => 'required',
            'buyerphone' => 'required',
            'purchase_type'=> 'required'
        ]);
        $data = Stock::find($request->id);
   if( $data->endquantity < $request->quantity)
    {
     return redirect()->back()
                             ->with(['error' => 'Not Enough Stock!']); 
    }
    else if($request->purchase_type == "credit")
    {
     $order = new Order();
      $credit = new Credit();  
       $credit->stockname = $request->stockname;
       $credit->stock_quantity = $request->quantity;
       $credit->cost = $request->totalprice;
       $credit->give = 1;
       $credit->customer_name = $request->buyerfullname;
      $credit->returndate = $request->returndate;
       $credit->save();
      
        $sales = new Sales();
        $sales->stockid	= $request->id;
        $sales->stockname	=  $request->stockname;
        $sales->quantity = $request->quantity;
        $sales->unit_buying_price =  $data->price;
        $sales->unit_selling_price= $request->price;
        $sales->total_selling_price=  $request->totalprice;
        $sales->customername= $request->buyerfullname;
        $sales->phonenumber= $request->buyerphone;
        $sales->sells_type=$request->purchase_type;
	

      $data->name=$request->stockname;
      $data->endquantity= ($data->endquantity) - ($request->quantity);
      $data->endbalance= ($data->endbalance)- ($request->quantity * $data->price);
      
      $order->stockname= $request->stockname;
      $order->stock_id= $request->id;
      $order->quantity = $request->quantity;
      $order->price = $request->price;
      $order ->printed = 0;
      if(Session::has('firstname')) 
      {
         $full_name_printed_by =  session('firstname');
         //session('middlename');
      }
         

      $order->printed_by=$full_name_printed_by;
      $order->customer_name=$request->buyerfullname;
      

              if($data->save() && $credit->save() &&  $sales->save() &&  $order->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Sold successfully.']); 
           }
    }
 else{  
   
        $sales = new Sales();  
        $order = new Order();
        $sales->stockid	= $request->id;
        $sales->stockname	=  $request->stockname;
        $sales->quantity = $request->quantity;
        $sales->unit_buying_price =  $data->price;
        $sales->unit_selling_price= $request->price;
        $sales->total_selling_price=  $request->totalprice;
        $sales->customername= $request->buyerfullname;
        $sales->phonenumber= $request->buyerphone;
        $sales->sells_type=$request->purchase_type;
	

         $data->name=$request->stockname;
         $data->endquantity= ($data->endquantity) - ($request->quantity);
         $data->endbalance= ($data->endbalance)- ($request->quantity * $data->price);
         
      $order->printed_by= "testname_printed_by";
      $order->customer_name =  "testname_customername";     
      $order->stockname= $request->stockname;
      $order->quantity = $request->quantity;
      $order->price = $request->price;
      $order->stock_id= $request->id;
      $order ->printed = 0;     

/*            if(Session::has('firstname')) 
      {
         $full_name_printed_by =  session('firstname');//.session('middlename');
      }
         $order->printed_by = $full_name_printed_by; */ 

              if($data->save() && $sales->save() &&  $order->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Sold successfully.']); 
           }
    }
    
        
    }
public function update_save(Request $request)
    {
            $request->validate([
            'stockname' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'supplier_fullname' => 'required',
            'location' => 'required',
            'purchase_type'=> 'required'
        ]);
        $data = Stock::find($request->id);
          $data->name=$request->stockname;
          $data->quantity=$request->quantity;
          $data->supplier_fullname=$request->supplier_fullname;
          $data->description=$request->description;
          $data->price=$request->price;
          $data->unit=$request->unit;
          $data->location=$request->location;
          $data->purchase_type=$request->purchase_type;
          $data->endquantity=$request->quantity;
          $data->beginingbalance= ($request->quantity)*($request->price);
          $data->endbalance= ($request->quantity)*($request->price);
          if($data->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Updated successfully.']); 
           }
        
    }
    public function recordcustomer(Request $request)
{
     $customer = new Customer();

     $request->validate([
            'customername' => 'required',
            'phonenumber' => 'required',
            'city' => 'required',
        ]);

    $customer->fullname = $request->customername;
    $customer->phonenumber= $request->phonenumber;
    $customer->city= $request->city;
    
    if($customer->save()){
        //return true;
     return redirect()->back()
                         ->with(['success' => 'Registered successfully.']);   

    }   
}
public function view_customers()
{
 
    $data = Customer::orderBy('created_at','desc')->get();
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
    return view('viewcustomers_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function deletecustomer($id)
{
     $data = Customer::find($id);  

 if($data->delete())
    {
      return redirect()->back()
                         ->with(['success' => 'Deleted successfully.']);  
    }
}

public function updatecustomer($id)
{
         $data = Customer::find($id);  
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
 return view('updatecustomer_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function updatecustomer_save(Request $request)
{
    $request->validate([
            'id' => 'required',
            'customername' => 'required',
            'phonenumber' => 'required',
            'city' => 'required'
        ]);
        $data = Customer::find($request->id);
          $data->fullname=$request->customername;
          $data->phonenumber=$request->phonenumber;
          $data->city=$request->city;

          if($data->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Updated successfully.']); 
           } 
}
public function stock_order()
{
      $data = Order::where([['printed',0],['status','confirmed']])->orderBy('created_at','desc')->get();
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
    return view('order_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]); 
}

public function print_stock(Request $request)
{
   $data = Order::where([['printed',0],['status','confirmed']])->orderBy('created_at','desc')->get();
  return view('print_preview',['post'=>$data]); 

}
public function donot_print_stock($id)
{
  $print_data = Order::find($id);  
  $print_data->printed=1;

 if($print_data->save())
    {
      return redirect()->back()
                         ->with(['success' => 'Removed From Print list successfully.']);  
    }  
}
public function cancel_order($orderid,$stockid)
{
 $order_data = Order::where('id',$orderid)->first();  
 $stock = Stock::where('id',$stockid)->first();   
$order_data->status = "cancelled"; 
$stock->endquantity = $stock->endquantity + $order_data->quantity;
$stock->endbalance  = $stock->endbalance + ($order_data->quantity * $stock->price);
 if($order_data->save() && $stock->save())
    {
      return redirect()->back()
                         ->with(['success' => 'Order cancelled successfully.']);  
    }  
}
public function return_stock()
{
      $data = Order::where('status','confirmed')->orderBy('created_at','desc')->get();
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
    return view('return_stock_admin',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]); 
    // return view('print_preview',['post'=>$data]); 
}
public function all_order()
{
       $data = Order::orderBy('created_at','desc')->get();
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
    return view('all_order_admin',['post'=>$data
,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);    
}
public function view_credit()
{
   $data = Sales::where('sells_type','=','credit')->orderBy('sells_type','asc')->get();
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
   return view('view_credit',['post'=>$credit
,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function view_credit_all()
{
   $data = Sales::where('sells_type','=','credit')->orderBy('sells_type','asc')->get();
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
   return view('view_credit',['post'=>$data
,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function view_debitinfo()
{
    $data = Stock::where('purchase_type','=','credit')->orderBy('purchase_type','desc')->get();
     $current_date = date('Y-m-d');         
     $credit = Sales::where('sells_type','=','credit')
     ->whereDate('credit_return_date', '<', $current_date)
     ->get();
    $debit = Stock::where('purchase_type','=','credit')
    ->whereDate('debit_return_date', '<', $current_date)
    ->orderBy('debit_return_date','asc')
    ->get();
    $credit_count=$credit->count();
    $debit_count = $debit->count();
    $total_notification = $credit_count+$debit_count;
   return view('view_debit',['post'=>$debit
,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);   
}
public function view_debitinfo_all()
{
    $data = Stock::where('purchase_type','=','credit')->orderBy('purchase_type','desc')->get();
     $current_date = date('Y-m-d');         
     $credit = Sales::where('sells_type','=','credit')
     ->whereDate('credit_return_date', '<', $current_date)
     ->get();
    $debit = Stock::where('purchase_type','=','credit')
    ->whereDate('debit_return_date', '<', $current_date)
    ->orderBy('debit_return_date','asc')
    ->get();
    $credit_count=$credit->count();
    $debit_count = $debit->count();
    $total_notification = $credit_count+$debit_count;
   return view('view_debit',['post'=>$data
,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);   
}
public function update_credit($id)
{
   $data = Sales::find($id);
   $data->sells_type="cash";
   if($data->save())
   {
       return redirect()->back()
       ->with(['success' => 'Changed to Paid successfully.']);
   }
}
public function update_debit($id)
{
   $data = Stock::find($id);
   $data->purchase_type="cash";
   if($data->save())
   {
       return redirect()->back()
       ->with(['success' => 'Changed to Paid successfully.']);
   }
}
public function recordstocknameadmin()
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
    $stockname = StockName::get();
return view('record_stock_nameadmin',['credit_count'=>$credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification,'stockname'=>$stockname]);
}
public function recordsupplieradmin()
{         $current_date = date('Y-m-d');         
         $credit = Sales::where('sells_type','=','credit')
         ->whereDate('credit_return_date', '<', $current_date)
         ->get();
        $debit = Stock::where('purchase_type','=','credit')
        ->whereDate('debit_return_date', '<', $current_date)
        ->get();
    $credit_count=$credit->count();
    $debit_count = $debit->count();
    $total_notification = $credit_count+$debit_count;
return view('record_supplier_admin',['credit_count'=>$credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function recordcustomeradmin() 
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
return view('record_customer_admin',['credit_count'=>$credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]); 
}
public function updateaccount($id)
{
   
    
         $data = User::find($id);
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
         
 return view('updateaccount',['post'=>$data
,'credit_count'=>$credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function updateaccount_save(Request $request)
{
    $request->validate([
            'id' => 'required',
            'fname' => 'required',
            'phonenumber' => 'required',
            'mname' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        $data = User::find($request->id);
          $data->fname=$request->fname;
          $data->phonenumber=$request->phonenumber;
          $data->mname=$request->mname;
          $data->role=$request->role;
          $data->email=$request->email;
          $data->password=Hash::make($request->password);

          if($data->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Updated successfully.']); 
           } 
}
public function deleteaccount($id)
{
 $data = User::find($id);  

 if($data->delete())
    {
      return redirect()->back()
                         ->with(['success' => 'Deleted successfully.']);  
    }
}
}
    
    
    
    
    