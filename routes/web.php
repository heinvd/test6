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
    return view('home');
});

Route::get('/admin', function() { return view('admin'); });
Route::get('/adminUsers','UsersController@listUsers');
Route::get('/adminProducts','ProductsController@listProducts');
Route::get('/adminProductsCreate','ProductsController@create');
Route::post('/adminProductsCreate','ProductsController@store');
Route::get('/adminProductsCreate/{id_product}','ProductsController@edit');
Route::post('/adminProductsCreate/{id_product}','ProductsController@update');

Route::get('/topup', function() { return view('topup'); });
Route::post('/topup','TopupController@topup');

Route::get('/transactionHistory','TransactionsController@listTransactions');
Route::get('/buynow/{id_product}','TransactionsController@buynow');
Route::post('/buynow/{id_product}','TransactionsController@purchase');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

