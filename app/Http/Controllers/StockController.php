<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use Hash;*/
use Illuminate\Support\Facades\Session;

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
class StockController extends Controller
 {
     public function recordStock_view()
     {
        
         $data = StockName::orderBy('name','asc')->get();
         $data2 = Supplier::orderBy('fullname','asc')->get();
         $data3 = Unit::orderBy('name','asc')->get();
         $data4 = Store::orderBy('storename','asc')->get();
      
        return view('register_stock',['post'=>$data,'supplier'=>$data2,'unit'=>$data3,'store'=>$data4]);
     }
     

    public function recordStock(Request $request)
    {
    
    $stock = new Stock();

     $request->validate([
            'stockname' => 'required',
            'quantity' => 'required',
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
   /* $stock->price = $request->price;*/
    $stock->purchase_type = $request->purchasetype;
    $stock->location = $request->row ." ".$request->column ;
    $stock->storename = $request->store ;
   // $stock->sellingprice = $request->sellingprice ;
    $stock->debit_return_date=$request->debit_return_date ;

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
  public function recordStockName(Request $request)
  {
        $stocknames = new StockName();

        $request->validate([ 'stockname' => 'required']);  
        $stocknames->name = $request->stockname;;
        $stockname = $request->stockname;;
        $existing_stockname = StockName::where('name','=',$stockname)->exists(); 

        if($existing_stockname)
        {
                return redirect()->back()
             ->with(['error' => 'Item already registered.']);     
        }
         else if($stocknames->save())
         {
         return redirect()->back()
             ->with(['success' => 'Registered successfully.']);   
    
        }  
  }
  public function recordstockname_view()
  {
     //  $data = Supplier::orderBy('created_at','desc')->get();
       
      $stockname = StockName::orderBy('name','asc')->get();
      return view('record_stock_name',['data'=>$stockname]);
  }
      public function record_unit_name_save(Request $request)
  {
          $unit = new Unit();
        $request->validate([ 'unitname' => 'required']);  
        $unit->name = $request->unitname;
        $unitname = $request->unitname;
        $existing_unitname = Unit::where('name','=',$unitname)->exists();
        if($existing_unitname)
        {
                return redirect()->back()
             ->with(['error' => 'Item already registered.']);     
        }
         else if($unit->save())
         {
         return redirect()->back()
             ->with(['success' => 'Unit Name Registered successfully.']);   
    
        }   
  }
      public function record_store_name_save(Request $request)
  {
         $store = new Store();

        $request->validate([ 'storename' => 'required']);  
        $store->storename = $request->storename;
         $storename = $request->storename;
        $existing_storename = Store::where('storename','=',$storename)->exists();
        if($existing_storename)
        {
                return redirect()->back()
             ->with(['error' => 'Storename already registered.']);     
        }
         if($store->save())
         {
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
    return view('viewsuppliers',['post'=>$data]);
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
 return view('updatesupplier',['post'=>$data]);
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
    return view('sell_stock_view',['post'=>$data]);    
}
public function view_stock()
{
 
    $data = Stock::orderBy('created_at','desc')->get();
    return view('viewstock',['post'=>$data]);
}
public function view_stock_sales()
{
   
    $data = Stock::orderBy('created_at','desc')->get();
    return view('viewstock_sales',['post'=>$data]);  
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
 return view('updatestock',['post'=>$data,'stockname'=>$data1,'supplier'=>$data2,'unit'=>$data3]);
}

public function sellstock($id)
{
         $data = Stock::find($id);  
 return view('sell_stock',['post'=>$data]);
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
    {       if(Session::has('firstname')) 
                    {
                     $full_name_printed_by =  session('firstname')." ".session('middlename');
                
                    }
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
        $sales->profit=$request->totalprice - ($request->quantity * $data->price) ;
        $sales->customername= $request->buyerfullname;
        $sales->phonenumber= $request->buyerphone;
        $sales->sells_type=$request->purchase_type;
        $sales->sold_by=$full_name_printed_by;
	

      $data->name=$request->stockname;
      $data->endquantity= ($data->endquantity) - ($request->quantity);
      $data->endbalance= ($data->endbalance)- ($request->quantity * $data->price);
      
      $order->stockname= $request->stockname;
      $order->stock_id= $request->id;
      $order->quantity = $request->quantity;
      $order->price = $request->price;
      $order ->printed = 0;
      $order->printed_by=$full_name_printed_by;
      $order->customer_name =  $request->buyerfullname; 
              if($data->save() && $credit->save() &&  $sales->save() &&  $order->save())
           {
               return redirect()->back()
                             ->with(['success' => 'Sold successfully.']); 
           }
    }
  else{  
        if(Session::has('firstname')) 
                    {
                     $full_name_printed_by =  session('firstname')." ".session('middlename');
                
                    }
        $sales = new Sales();  
        $order = new Order();
        $sales->stockid	= $request->id;
        $sales->stockname	=  $request->stockname;
        $sales->quantity = $request->quantity;
        $sales->unit_buying_price =  $data->price;
        $sales->unit_selling_price= $request->price;
        $sales->total_selling_price=  $request->totalprice;
        $sales->profit=$request->totalprice - ($request->quantity * $data->price) ;
	    $sales->customername= $request->buyerfullname;
        $sales->phonenumber= $request->buyerphone;
        $sales->sells_type=$request->purchase_type;
        $sales->sold_by=$full_name_printed_by;
       // $sales->

         $data->name=$request->stockname;
         $data->endquantity= ($data->endquantity) - ($request->quantity);
         $data->endbalance= ($data->endbalance)- ($request->quantity * $data->price);
          
      $order->stockname= $request->stockname;
      $order->quantity = $request->quantity;
      $order->price = $request->price;
      $order->stock_id= $request->id;
      $order ->printed = 0;
      $order->printed_by=$full_name_printed_by;
      $order->customer_name =  $request->buyerfullname; 
   
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
            'sellingprice' => 'required',
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
          $data->sellingprice=$request->sellingprice;
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
    return view('viewcustomers',['post'=>$data]);
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
 return view('updatecustomer',['post'=>$data]);
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
    return view('order',['post'=>$data]); 
    // return view('print_preview',['post'=>$data]); 
}

public function print_stock(Request $request)
{
 //$data = array_filter($request->printcheckbox);
   $data = Order::where([['printed',0],['status','confirmed']])->orderBy('created_at','desc')->get();
  return view('print_preview',['post'=>$data]); 

}
public function print_order_func($printed_item_array)
{
 foreach($printed_item_array as $key => $id) {
   // $data = Order::where('id', $id)->update(['printed' => '1']);
    $data  = Order::find($id);  
    $data->printed=1;
    $data->save();
}   
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
 //$sales =  Sales::where('stockid',$id)->first();

 $stock = Stock::where('id',$stockid)->first();   
 
$order_data->status = "cancelled"; 
$stock->endquantity = $stock->endquantity + $order_data->quantity;
$stock->endbalance  = $stock->endbalance + ($order_data->quantity * $stock->price);
//$sales->status="cancelled";
 
 if($order_data->save() && $stock->save())
    {
      return redirect()->back()
                         ->with(['success' => 'Order cancelled successfully.']);  
    }  
}
public function return_stock()
{
      $data = Order::where('status','confirmed')->orderBy('created_at','desc')->get();
    return view('return_stock',['post'=>$data]); 
    // return view('print_preview',['post'=>$data]); 
}
public function all_order()
{
       $data = Order::orderBy('created_at','desc')->get();
    return view('all_order',['post'=>$data]);    
}
  public function record_damage_func_store(Request $request)
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
       public function record_damage_()
     {

        $data = StockName::orderBy('name','asc')->get();
               return view('register_damage',['post'=>$data]);  
     }
}
    
    
    
    
    