<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SitemapXmlController;
use App\Http\Controllers\FoodBeverageController;

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

Auth::routes();

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.index');
     });
    Route::resource('foodBeverages',FoodBeverageController::class);
    Route::resource('orders',OrderController::class);
    Route::get('view-order/{id}',[OrderController::class,'view']);
    Route::put('update-order/{id}',[OrderController::class,'update']);
    Route::get('order-history',[OrderController::class,'orderHistory']);
    Route::get('/xml', [SitemapXmlController::class, 'index']);
    Route::get('/readxml', [SitemapXmlController::class, 'read']);


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', 'App\Http\Controllers\MenuController@index');
Route::get('menu_di', 'App\Http\Controllers\MenuController@menu_di');
Route::get('menu_ta', 'App\Http\Controllers\MenuController@menu_ta');
Route::get('cart', 'App\Http\Controllers\MenuController@cart');
Route::get('add-to-cart/{id}', 'App\Http\Controllers\MenuController@addToCart');
Route::get('decrease-cart/{id}', 'App\Http\Controllers\MenuController@decrease');
Route::get('increase-cart/{id}', 'App\Http\Controllers\MenuController@increase');
Route::get('remove-from-cart/{id}', 'App\Http\Controllers\MenuController@remove');
Route::get('placeOrder/{total}', 'App\Http\Controllers\MenuController@placeOrder');
Route::get('bill', 'App\Http\Controllers\MenuController@bill');
Route::get('invalid', 'App\Http\Controllers\MenuController@invalid');
Route::get('orderRest','App\Http\Controllers\MenuController@rest1');
Route::get('detailsRest','App\Http\Controllers\MenuController@rest2');