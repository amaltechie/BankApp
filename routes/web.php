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

Route::get('/register','RegisterController@register');
Route::post('/register','RegisterController@create');
Route::get('/login','RegisterController@login');
Route::post('/login','RegisterController@check');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/deposit/create','BankController@create');
Route::patch('/deposit/{User}','BankController@update');

Route::get('/withdraw/create','WithdrawalController@create');
Route::patch('/withdraw/{User}','WithdrawalController@update');

Route::get('/statements','StatementsController@index');

Route::get('/transfer/create','TransferController@create');
Route::patch('/transfer/{User}','TransferController@update');