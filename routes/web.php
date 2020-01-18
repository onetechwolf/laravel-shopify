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

Route::get('/redirect-url', 'HomeController@redirect');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product-new', 'HomeController@create');
Route::post('/product-post', 'HomeController@post');
Route::get('/product-view/{id}', 'HomeController@view')->name('productview');
Route::get('/product-edit/{id}', 'HomeController@edit');
Route::post('/product-put', 'HomeController@put');
Route::get('/delete/{id}', 'HomeController@delete');

// Customers
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/customer-new', 'CustomerController@create');
Route::get('/customer-view/{id}', 'CustomerController@view')->name('customerview');
Route::get('/customer-edit/{id}', 'CustomerController@edit');
Route::post('/customer-post', 'CustomerController@post');
Route::post('/customer-put', 'CustomerController@put');
Route::get('/customer-delete/{id}', 'CustomerController@delete');

// Orders
Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/order-new', 'OrderController@create');
Route::get('/order-view/{id}', 'OrderController@view')->name('orderview');
Route::get('/order-edit/{id}', 'OrderController@edit');
Route::post('/order-post', 'OrderController@post');
Route::post('/order-put', 'OrderController@put');
Route::get('/order-delete/{id}', 'OrderController@delete');