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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dahal', 'Controller@dahala')->name('dahal');
Route::resource('nas','NasController');
Route::resource('radcheck','RadcheckController');
Route::resource('radgroupcheck','RadGroupcheckController');
Route::resource('radacct','RadacctController');
Route::resource('radpostauth','RadPostauthController');
Route::resource('radgroupreply','RadgroupReplyController');
