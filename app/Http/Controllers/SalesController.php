<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*use Hash;*/
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Sales;
use Carbon\Carbon;
use DateTime;

class SalesController extends Controller
 {
    
public function view_stock_sales()
{
   
    $data = Stock::orderBy('created_at','desc')->get();
    return view('viewstock_sales',['post'=>$data]);  
}
public function daily_sales_report()
{
   
    $data = Sales::whereDate('created_at', '=', date('Y-m-d'))->get();
    
    $piechart_daily_sales = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->groupBy('stockname')
                ->get();
    $piechart_daily_loss = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->where('profit', '<', 0)
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->groupBy('stockname')
                ->get();            
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
        $resultArray = json_decode(json_encode($piechart_daily_sales), true);
        $lossArray = json_decode(json_encode($piechart_daily_loss), true);
    return view('daily_sales_report',['post'=>$data,'piechartdaily'=>$resultArray,'lossdaily'=>$lossArray,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function weekly_sales_report()
{
$date_7days_ago =  Carbon::today()->subDays(7);  
$data = Sales::whereDate('created_at', '>', $date_7days_ago)->paginate(5);
$piechart_daily_sales = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->whereDate('created_at', '>', $date_7days_ago)
                ->groupBy('stockname')
                ->get();
$piechart_weekly_loss = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->where('profit', '<', 0)
                ->whereDate('created_at', '>', $date_7days_ago)
                ->groupBy('stockname')
                ->get();
    $lossArray = json_decode(json_encode($piechart_weekly_loss), true);                
    $resultArray = json_decode(json_encode($piechart_daily_sales), true);
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
    return view('weekly_sales_report',['post'=>$data,'piechartweekly'=>$resultArray,'lossweekly'=>$lossArray,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function weekly_sales_report_admin_home()
{
$date_7days_ago =  Carbon::today()->subDays(7);  

$data = Sales::whereDate('created_at', '>', $date_7days_ago)->paginate(5);
$piechart_daily_sales = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->whereDate('created_at', '>', $date_7days_ago)
                ->groupBy('stockname')
                ->get();
$piechart_weekly_loss = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->where('profit', '<', 0)
                ->whereDate('created_at', '>', $date_7days_ago)
                ->groupBy('stockname')
                ->get();
$lossArray = json_decode(json_encode($piechart_weekly_loss), true);                
$resultArray = json_decode(json_encode($piechart_daily_sales), true);
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
    return view('admin_dashboard',['post'=>$data,'piechartweekly'=>$resultArray,'lossweekly'=>$lossArray,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function monthly_sales_report()
{
$date_30days_ago =  Carbon::today()->subDays(30);  
$data = Sales::whereDate('created_at', '>', $date_30days_ago)->paginate(5);
$piechart_monthly_sales = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->whereDate('created_at', '>', $date_30days_ago)
                ->groupBy('stockname')
                ->get();
$piechart_monthly_loss = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->where('profit', '<', 0) 
                 ->whereDate('created_at', '>', $date_30days_ago)
                ->groupBy('stockname')
                ->get()  
               ;
    $lossArray = json_decode(json_encode($piechart_monthly_loss), true);                
    $resultArray = json_decode(json_encode($piechart_monthly_sales), true);
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
    return view('monthly_sales_report',['post'=>$data,'piechartmonthly'=>$resultArray,'lossmonthly'=>$lossArray,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function all_sales_report(Request $request )
{
   $date1 =  $request->date1;
   $date2 = $request->date2;
   $date1_converted = DateTime::createFromFormat('Y-m-d',$date1 )->format('Y-m-d');
   $date2_converted = DateTime::createFromFormat('Y-m-d', $date2)->format('Y-m-d');
   $data = Sales::whereDate('created_at', '>=',$date1_converted)
                ->whereDate('created_at', '<=',$date2_converted)->get();
$piechart_monthly_sales = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->whereDate('created_at', '>=',$date1_converted)
                ->whereDate('created_at', '<=',$date2_converted)
                ->groupBy('stockname')
                ->get();
$piechart_monthly_loss = DB::table('sales')
                ->select('stockname',DB::raw('SUM(quantity) as quantity'),'unit_buying_price','unit_selling_price',
     DB::raw('SUM(total_selling_price) as total_selling_price'),DB::raw('SUM(profit) as profit'))
                ->where('profit', '<', 0) 
                 ->whereDate('created_at', '>=',$date1_converted)
                ->whereDate('created_at', '<=',$date2_converted)
                ->groupBy('stockname')
                ->get();
    $lossArray = json_decode(json_encode($piechart_monthly_loss), true);                
    $resultArray = json_decode(json_encode($piechart_monthly_sales), true);
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
    return view('all_sales_report_view',['post'=>$data,'piechartallsales'=>$resultArray,'lossmonthly'=>$lossArray,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function stock_onhand_repfunc()
{
    $data = Stock::where('endquantity','>',0)->get();
    $data2 = Stock::where('endquantity','>',0)
    ->groupBy('name')
    ->get();
    $itemtypecount = $data2->count();
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
    return view('viewstock_onhand',['post'=>$data,'itemtype'=>$itemtypecount,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);    
}
public function near_stock_outfunc()
{
    $data = DB::table('stock')
    ->select('id','name','quantity','unit','supplier_fullname','description','price','location','purchase_type','created_at','updated_at','endquantity',
    'beginingbalance','endbalance',DB::raw('(endquantity/quantity) AS stockpercent'))
    ->where('stockpercent','>',0)
    ->where('stockpercent','<',0.20)
    ->get();
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
    return view('viewstock_nearstock',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);    
}

public function stockout_report()
{
    $data = Stock::where('endquantity','=',0)->get();
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
    return view('stockout_report',['post'=>$data,'credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]);
}
public function allsalesreport()
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
  return view('all_sales_report',['credit_count'=>
    $credit_count,'debit_count'=>$debit_count,'total_notification'=>$total_notification]); 
}
}
    
    
    
    
    