<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home')->with('success', 'Welcome to Dahal radius.');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('nas','NasController');
Route::resource('radacct','RadacctController');
Route::resource('radpostauth','RadPostauthController');
Route::get('settings','Controller@settings')->name('settings');
Route::post('settings/create','Controller@create')->name('settings.create');
Route::resource('customers','RadiusCustomerController');
Route::resource('group-setting','RadgroupCheckReplyController');
Route::resource('billing','BillingController');
Route::post('billing/transfer','BillingController@transfer')->name('billing.transfer');
//Route::get('billing','BillingController@index')->name('billing.index');
//Route::get('billing','BillingController@index')->name('billing.index');
//Route::get('billing/create','BillingController@create')->name('billing.create');
//Route::post('billing/store','BillingController@store')->name('billing.store');
//Route::get('billing/{billing}/edit','BillingController@edit')->name('billing.edit');
//Route::post('billing/{billing}','BillingController@update')->name('billing.update');
Route::get('transactions','TransactionHistoryController@index')->name('transactions.index');
