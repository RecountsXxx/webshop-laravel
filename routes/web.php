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

Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');
Route::get('/category/{cat}', '\App\Http\Controllers\ProductController@showCategory')->name('show_category');
Route::get('/category/{cat}/{id}', '\App\Http\Controllers\ProductController@show')->name('show_product');
Route::get('/cart', '\App\Http\Controllers\CartController@index')->name('cart_index');
Route::get('/cart/add/{id}', '\App\Http\Controllers\CartController@addToCart')->name('cart_add');
Route::get('/cart/remove/{index}', '\App\Http\Controllers\CartController@removeFromCart')->name('cart_remove');
Route::get('/cart/clear', '\App\Http\Controllers\CartController@clearCart')->name('clear_cart');
Route::get('/contact', function(){return view('contact.index');})->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
