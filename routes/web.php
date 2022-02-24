<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/admin','AdminController@ShowImportantInfo')->middleware(['auth','role:user']);
Route::get('/managefile','AdminController@file');
Route::resource('/catalog','CatalogController');
Route::resource('/post','PostController');
Route::resource('/category','CategoryController');
Route::resource('/product','ProductController');
Route::resource('/tag','TagsController');
// Route::resource('/order','OrderController');
Route::post('/order/addToCart','OrderController@addToCart')->name('order.addToCart');
Route::get('/order/edtCart','OrderController@edtCart')->name('order.edtCart');
Route::delete('/order/rmFromCart','OrderController@rmFromCart')->name('order.rmFromCart');
Route::post('/order/saveCart','OrderController@saveCart')->name('order.saveCart');
Route::get('/order/getInfoCart','OrderController@getInfoCart')->name('order.getInfoCart');
Route::post('/order/confirmCart','OrderController@confirmCart')->name('order.confirmCart');
Route::post('/order/buyCart','OrderController@buyCart')->name('order.buyCart');


Route::get('/product/cateshow/{category}','ProductController@CategoryShow')->name('product.cateshow');
Route::get('/product/catashow/{catalog}','ProductController@CatalogShow')->name('product.catashow');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
