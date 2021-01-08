<?php

// Guest Routes
Route::get('/', function () {
    return redirect('cash');
});

Route::get('contactus', function () {
    return view('web.contactus');
})->name('contactus');

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('register', 'Auth\RegisterController@register');
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('home', function() {
        /*if (Auth::user()->role == 'admin') {
            return redirect('groups');
        }
        else if (Auth::user()->role == 'accountant') {
            return redirect('accounts');
        }*/
        return redirect('cash');
    })->name('home');
});

Route::group(['middleware' => ['auth', 'casher']], function () {

    // Casher Routes


    //CASH HESEG 2020-08-03 BUSAD HEREGGUIG N TSEWERLEH
    Route::get('cash', 'CashController@index')->name('cash');
    Route::post('toCatch', 'CashController@toCatch')->name('toCatch');
    Route::get('update_balance/{balance_id}', 'CashController@updateBalance')->name('update_balance');

    // Users Routes
    Route::get('shops', 'ConstInfoController@shops')->name('shops');
    Route::post('store_stores', 'ConstInfoController@store_stores')->name('store_stores');
    Route::get('removeStore/{uid}', 'ConstInfoController@removeStore');
    // Income Routes TUR HAAW 09-10
    /*Route::get('income', 'CashController@income')->name('income');
    Route::get('showIncome/{shop_id}', 'CashController@showIncome')->name('showIncome');*/
    Route::get('insertBalance/{shop_id}/{pay_type}/{values}/{action_date}/{balance_type}/{notes}', 'CashController@insertBalance')->name('insIncome');
   // Remain Routes
    Route::get('remain', 'CashController@remain')->name('remain');
    Route::get('showRemain/{shop_id}', 'CashController@showRemain')->name('showRemain');
    Route::get('cashreport_sel/{shop_id}', 'CashController@cashreport_sel')->name('cashreport_sel');










    /// ---------- ///

    Route::get('order/{id}', 'CashController@orderSelected');
    Route::get('order/{order}/add/{id}', 'CashController@addToOrder');
    Route::post('updateorder', 'CashController@updateOrder')->name('updateorder');
    Route::get('delorder/{order}', 'CashController@delOrder');
    Route::post('updatefeecount', 'CashController@updateFeeCount')->name('updatefeecount');
    Route::post('addpayment', 'CashController@addPayment')->name('addpayment');

    // Cash Report Routes
    Route::get('pricelist', 'CashController@priceList')->name('pricelist');
    Route::get('cashreport', 'CashController@cashReport')->name('cashreport');
    Route::get('showBalance/{shop_id}', 'CashController@showBalance')->name('showBalance');
    Route::get('showBalanceitem/{balance_id}', 'CashController@showBalanceitem')->name('showBalanceitem');
    Route::get('delBalance/{balance_id}', 'CashController@delBalance')->name('delBalance');
    Route::get('updateBalance/{balance_id}', 'CashController@updateBalance')->name('updateBalance');
    Route::get('getbalance/{id1}/{id2}/{shop_id}', 'CashController@getbalance');
    Route::get('getbalanceDetail/{id1}/{id2}/{type_id}/{shopid}', 'CashController@getbalanceDetail');
    Route::get('balancereport', 'CashController@balancereport')->name('balancereport');


    // Print Routes
    Route::get('print_zp/{orderid}', 'PrintController@ZarlagiinPadaan')->name('print_zp');
});

Route::group(['middleware' => ['auth', 'accountant']], function () {

    // Const Info Routes
    Route::get('const_info', 'ConstInfoController@index')->name('const_info');
    Route::post('store_factory', 'ConstInfoController@storeFactory')->name('store_factory');
    Route::get('remove_factory/{fid}', 'ConstInfoController@removeFactory');
    Route::post('store_pipe_type', 'ConstInfoController@storePipeType')->name('store_pipe_type');
    Route::get('remove_pipe_type/{tid}', 'ConstInfoController@removePipeType');
    Route::post('store_pay_type', 'ConstInfoController@storePayType')->name('store_pay_type');
    Route::get('remove_pay_type/{pid}', 'ConstInfoController@removePayType');

    // Customer Routes
   /* Route::get('customers', 'ConstInfoController@customers')->name('customers');
    Route::post('store_customer', 'ConstInfoController@storeCustomer')->name('store_customer');
    Route::get('remove_customer/{cid}', 'ConstInfoController@removeCustomer'); TUR HAAW CAUSE CUSTOMER TABLE DELETED*/

    // Product Main Routes
    Route::get('product_main/{fid?}', 'ProductController@index')->name('product_main');
    Route::post('store_product_main', 'ProductController@storeMain')->name('store_product_main');
    Route::get('remove_product_main/{mid}', 'ProductController@removeMain');
    Route::get('filter_main_factory/{fid}', 'ProductController@filterMainFactory');

    Route::get('product_item', 'ProductController@item')->name('product_item');
    Route::post('store_product_item', 'ProductController@storeItem')->name('store_product_item');
    Route::get('remove_product_item/{iid}', 'ProductController@removeItem');
    Route::get('filter_item_factory/{fid}', 'ProductController@filterItemFactory');
    Route::get('filter_item_main/{mid}', 'ProductController@filterItemMain');

    Route::get('salary', 'SalaryController@index')->name('salary');
    Route::post('store_salary', 'SalaryController@store')->name('store_salary');
    Route::get('removesalary/{uid}', 'SalaryController@remove');
    Route::get('/filter_shop/{id}', 'SalaryController@filter_shop');
    Route::get('/filter_emp/{id}', 'SalaryController@filter_emp');

});

Route::group(['middleware' => ['auth', 'admin']], function () {
    // Users Routes
    Route::get('users', 'ConstInfoController@users')->name('users');
    Route::post('store_user', 'ConstInfoController@storeUser')->name('store_user');
    Route::get('remove_user/{uid}', 'ConstInfoController@removeUser');
});
Route::get('employee', 'EmployeeController@index')->name('employee');
Route::post('store_employee', 'EmployeeController@store')->name('store_employee');
Route::get('remove_employee/{uid}', 'EmployeeController@removeemployee');
