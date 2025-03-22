<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Password;

Route::get('/', function () {
    return view('login');
});
Route::post('login', [App\Http\Controllers\AccountController::class, 'customLogin'])->name('login');
/*Route::get('register-account', function(){
    
    return view('signupjobs');
})->name('signup_account');*/

Route::get('create-account-admin', [App\Http\Controllers\AccountController::class, 'createaccountview'])->name('signup_account_admin')->middleware('auth');
Route::post('signup', [App\Http\Controllers\AccountController::class, 'customRegistrationjobs'])->name('signup')->middleware('auth');
Route::get('stock-dashboard', function()
    {
        return view('stockdashboard');
        
    } )->name('stockdashboard')->middleware('auth'); 
Route::get('admin-dashboard',[App\Http\Controllers\SalesController::class,'weekly_sales_report_admin_home'])->name('admindashboard')->middleware('auth');
Route::get('sign-out', [App\Http\Controllers\AccountController::class, 'signOut'])->name('signout');    
Route::get('login',
function(){
  return view('login');  
}
)->name('login');

Route::get('register-stocks', [App\Http\Controllers\StockController::class, 'recordStock_view'])->name('register_mystocks')->middleware('auth');
Route::post('register-stock', [App\Http\Controllers\StockController::class, 'recordStock'])->name('registerstock')->middleware('auth'); 
Route::post('register-stock-name', [App\Http\Controllers\StockController::class, 'recordStockName'])->name('registerstock_name')->middleware('auth'); 
Route::get('record-stock-name',[App\Http\Controllers\StockController::class,'recordstockname_view'])->name('record_stock_name')->middleware('auth'); 
/*function(){
    return view('record_stock_name');
})->name('record_stock_name')->middleware('auth'); 
*/
Route::get('stock-list',[App\Http\Controllers\StockController::class,'view_stock'])->name('view_stock')->middleware('auth');
Route::get('delete-stock/{id}',[App\Http\Controllers\StockController::class,'deletestock'])->middleware('auth');
Route::get('update-stock/{id}',[App\Http\Controllers\StockController::class,'updatestock'])->middleware('auth');
Route::post('update-stock-save',[App\Http\Controllers\StockController::class,'update_save'])->name('update_stock_save')->middleware('auth');
Route::get('record-suppliers', 
function ()
{
    return view('record_supplier');
}
)->name('recordsupplierview')->middleware('auth');
Route::post('register-supplier', [App\Http\Controllers\StockController::class, 'recordsupplier'])->name('registersupplier')->middleware('auth');
Route::get('suppliers-list',[App\Http\Controllers\StockController::class,'view_supplers'])->name('view_supplier')->middleware('auth');
Route::get('delete-supplier/{id}',[App\Http\Controllers\StockController::class,'deletesupplier'])->middleware('auth');
Route::get('update-supplier/{id}',[App\Http\Controllers\StockController::class,'updatesupplier'])->middleware('auth');
Route::post('update-supplier-save',[App\Http\Controllers\StockController::class,'updatesupplier_save'])->name('update_supplier_save')->middleware('auth');

Route::get('sales-dashboard',
function(){
    return view('sales_dashboard');
})->name('sales_dashboard')->middleware('auth'); 

Route::get('sell-stock-list',[App\Http\Controllers\StockController::class,'view_sell_stock'])->name('sell_mystocks')->middleware('auth');
Route::get('sell-stock/{id}',[App\Http\Controllers\StockController::class,'sellstock'])->middleware('auth');
Route::post('sell-stock-save',[App\Http\Controllers\StockController::class,'sell_save'])->name('sell_stock_save')->middleware('auth');
Route::get('record-customer', 
function ()
{
    return view('record_customer');
}
)->name('recordcustomerview')->middleware('auth');
Route::get('stock-list-sales',[App\Http\Controllers\StockController::class,'view_stock_sales'])->name('view_stocksales')->middleware('auth');
Route::post('register-customer', [App\Http\Controllers\StockController::class, 'recordcustomer'])->name('registercustomer')->middleware('auth');
Route::get('customer-list',[App\Http\Controllers\StockController::class,'view_customers'])->name('view_customer')->middleware('auth');
Route::get('delete-customer/{id}',[App\Http\Controllers\StockController::class,'deletecustomer'])->middleware('auth');
Route::get('update-customer/{id}',[App\Http\Controllers\StockController::class,'updatecustomer'])->middleware('auth');
Route::post('update-customer-save',[App\Http\Controllers\StockController::class,'updatecustomer_save'])->name('update_customer_save')->middleware('auth');
Route::get('stock-order', [App\Http\Controllers\StockController::class,'stock_order'])->name('orderstock')->middleware('auth');
Route::get('return-stock-view',[App\Http\Controllers\StockController::class,'return_stock'])->name('returnstock')->middleware('auth');
Route::post('print-stock', [App\Http\Controllers\StockController::class,'print_stock'])->name('printstockdata')->middleware('auth');
Route::get('dontprint-stock/{id}',[App\Http\Controllers\StockController::class,'donot_print_stock'])->name('donotprintstockdata')->middleware('auth');
Route::get('cancel-order/{orderid}/{stockid}',[App\Http\Controllers\StockController::class,'cancel_order'])->name('cancelorder')->middleware('auth');
Route::get('all-order', [App\Http\Controllers\StockController::class,'all_order'])->name('view_all_order')->middleware('auth');
Route::get('daily-sales-report', [App\Http\Controllers\SalesController::class,'daily_sales_report'])->name('dailysalesreports')->middleware('auth');
Route::get('weekly-sales-report', [App\Http\Controllers\SalesController::class,'weekly_sales_report'])->name('weeklysalesreport')->middleware('auth');
Route::get('monthly-sales-report', [App\Http\Controllers\SalesController::class,'monthly_sales_report'])->name('monthlysalesreport')->middleware('auth');
Route::get('all-sales-report', [App\Http\Controllers\SalesController::class,'allsalesreport'])->name('all_sale_report')->middleware('auth');
Route::post('register-stock-admin', [App\Http\Controllers\AdminController::class, 'recordStock'])->name('registerstock_admin')->middleware('auth'); 
Route::post('all-sales-daily-report', [App\Http\Controllers\SalesController::class,'all_sales_report'])->name('all_sales_post')->middleware('auth');
Route::get('all-sales-daily-report', [App\Http\Controllers\SalesController::class,'all_sales_report'])->middleware('auth');
Route::get('stockonhand-report', [App\Http\Controllers\SalesController::class,'stock_onhand_repfunc'])->name('stock_onhand_report')->middleware('auth');
Route::get('nearstockout-report', [App\Http\Controllers\SalesController::class,'near_stock_outfunc'])->name('nearstockout_report')->middleware('auth');
Route::get('stockout-report', [App\Http\Controllers\SalesController::class,'stockout_report'])->name('stockout_report')->middleware('auth');
Route::get('register-stocks-admin', [App\Http\Controllers\AdminController::class, 'recordStock_view'])->name('register_mystocks_admin')->middleware('auth');
Route::get('stock-list-admin',[App\Http\Controllers\AdminController::class,'view_stock'])->name('view_stock_admin')->middleware('auth');
Route::get('record-stock-name-admin',[App\Http\Controllers\AdminController::class,'recordstocknameadmin'])->name('record_stock_name_admin')->middleware('auth'); 

Route::get('record-suppliers-admin',[App\Http\Controllers\AdminController::class,'recordsupplieradmin'])->name('recordsupplierview_admin')->middleware('auth');

Route::get('suppliers-list-admin',[App\Http\Controllers\AdminController::class,'view_supplers'])->name('view_supplier_admin')->middleware('auth');
Route::get('sell-stock-list-admin',[App\Http\Controllers\AdminController::class,'view_sell_stock'])->name('sell_mystocks_admin')->middleware('auth');
Route::get('return-stock-view-admin',[App\Http\Controllers\AdminController::class,'return_stock'])->name('returnstock_admin')->middleware('auth');
Route::get('stock-list-sales-admin',[App\Http\Controllers\AdminController::class,'view_stock_sales'])->name('view_stocksales_admin')->middleware('auth');
Route::get('stock-order-admin', [App\Http\Controllers\AdminController::class,'stock_order'])->name('orderstock_admin')->middleware('auth');
Route::get('all-order-admin', [App\Http\Controllers\AdminController::class,'all_order'])->name('view_all_order_admin')->middleware('auth');
Route::get('record-customer-admin', [App\Http\Controllers\AdminController::class,'recordcustomeradmin'])->name('recordcustomerview_admin')->middleware('auth');

Route::get('customer-list-admin',[App\Http\Controllers\AdminController::class,'view_customers'])->name('view_customer_admin')->middleware('auth');
Route::get('update-supplier-admin/{id}',[App\Http\Controllers\AdminController::class,'updatesupplier'])->middleware('auth');
Route::post('update-supplier-save-admin',[App\Http\Controllers\AdminController::class,'updatesupplier_save'])->name('update_supplier_save_admin')->middleware('auth');
Route::get('delete-supplier-admin/{id}',[App\Http\Controllers\AdminController::class,'deletesupplier'])->middleware('auth');
Route::get('sell-stock-admin/{id}',[App\Http\Controllers\AdminController::class,'sellstock'])->middleware('auth');
Route::post('record-damaged-stock',[App\Http\Controllers\AdminController::class,'record_damage_func'])->name('record_damage')->middleware('auth');
Route::get('record-damaged-stock',[App\Http\Controllers\AdminController::class,'record_damage_'])->name('recorddamage')->middleware('auth');
Route::get('record-cash-out',[App\Http\Controllers\AdminController::class,'record_cashout_'])->name('recordcashout')->middleware('auth');
Route::post('record-cash-out',[App\Http\Controllers\AdminController::class,'record_cashout_func'])->name('record_cashout')->middleware('auth');

Route::get('delete-customer-admin/{id}',[App\Http\Controllers\AdminController::class,'deletecustomer'])->middleware('auth');
Route::get('update-customer-admin/{id}',[App\Http\Controllers\AdminController::class,'updatecustomer'])->middleware('auth');
Route::get('update-stock-admin/{id}',[App\Http\Controllers\AdminController::class,'updatestock'])->middleware('auth');
Route::get('delete-stock-admin/{id}',[App\Http\Controllers\AdminController::class,'deletestock'])->middleware('auth');
Route::get('credit-list-admin',[App\Http\Controllers\AdminController::class,'view_credit'])->name('credit')->middleware('auth');
Route::get('debit-list-admin',[App\Http\Controllers\AdminController::class,'view_debitinfo'])->name('debit')->middleware('auth');

Route::get('credit-list-admin-all',[App\Http\Controllers\AdminController::class,'view_credit_all'])->name('credit_all')->middleware('auth');
Route::get('debit-list-admin-all',[App\Http\Controllers\AdminController::class,'view_debitinfo_all'])->name('debit_all')->middleware('auth');

Route::get('update-credit-admin/{id}',[App\Http\Controllers\AdminController::class,'update_credit'])->middleware('auth');
Route::get('update-debit-admin/{id}',[App\Http\Controllers\AdminController::class,'update_debit'])->middleware('auth');
Route::post('change-password',[App\Http\Controllers\AccountController::class,'update_password'])->name('changepassword')->middleware('auth');
Route::get('change_password-get',[App\Http\Controllers\AccountController::class,'return_change_passwd_view'])->name('changeoldpassword')->middleware('auth');
Route::get('change_password-sales',
function ()
{
    return view('change_password_sales');
}
)->name('changeoldpasswordsales')->middleware('auth');
Route::get('change_password-purchaser',
function ()
{
    return view('changepassword_purchaser');
}
)->name('changeoldpasswordpurchaser')->middleware('auth');

Route::get('record-store-name',[App\Http\Controllers\AdminController::class,'record_storename_view'])->name('recordstorename')->middleware('auth');
Route::post('record-store_name',[App\Http\Controllers\AdminController::class,'record_storename_save'])->name('recordstorenamesave')->middleware('auth');
Route::get('record-unit',[App\Http\Controllers\AdminController::class,'record_unit_name_view'])->name('recordunit')->middleware('auth');
Route::post('record-unit_name_admin',[App\Http\Controllers\AdminController::class,'record_unit_name_save'])->name('recordunitsave')->middleware('auth');
Route::get('register-unit-name', function () {
    return view('register_unit');
})->name('recordunitsave_storekeeper')->middleware('auth');
Route::post('record-unit_name',[App\Http\Controllers\StockController::class,'record_unit_name_save'])->name('recordunit_save')->middleware('auth');
Route::get('register-store-name', function () {
    return view('register_store_name');
})->name('recordstorenameview')->middleware('auth');
Route::post('record-store_name_store',[App\Http\Controllers\StockController::class,'record_store_name_save'])->name('recordstorenamesave_store')->middleware('auth');

Route::post('record-damaged-stock-store',[App\Http\Controllers\StockController::class,'record_damage_func_store'])->name('record_damage_store')->middleware('auth');
Route::get('record-damaged-stocks',[App\Http\Controllers\StockController::class,'record_damage_'])->name('recorddamage_store')->middleware('auth'); 
Route::get('print-order/{printed_item_array}',[App\Http\Controllers\StockController::class,'print_order_func'])->name('print_order')->middleware('auth'); 

Route::get('forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password-reset', [App\Http\Controllers\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('usermanual-sales',
function ()
{
    return view('usermanual_sales');
})->name('usermanualsales')->middleware('auth');
Route::get('usermanual-admin',[App\Http\Controllers\AdminController::class, 'usermanualview'])->name('usermanualadmin')->middleware('auth');
Route::get('usermanual-storekeeper',
function ()
{
    return view('usermanual_storekeeper');
})->name('usermanualstorekeeper')->middleware('auth');
/*Route::get('sendbasicemail',[App\Http\Controllers\MailController::class,'basic_email']);
Route::get('sendhtmlemail',[App\Http\Controllers\MailController::class,'html_email']);
Route::get('sendattachmentemail',[App\Http\Controllers\MailController::class,'attachment_email']);*/

Route::get('view-account',[App\Http\Controllers\AccountController::class, 'viewaccount'])->name('view_account')->middleware('auth');
Route::get('update-account-admin/{id}',[App\Http\Controllers\AdminController::class,'updateaccount'])->middleware('auth');
Route::post('update-account-save-admin',[App\Http\Controllers\AdminController::class,'updateaccount_save'])->name('update_account_save_admin')->middleware('auth');
Route::get('delete-account-admin/{id}',[App\Http\Controllers\AdminController::class,'deleteaccount'])->middleware('auth');


/* 
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');*/