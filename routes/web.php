<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderAPIController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SitemapXmlController;
use App\Http\Controllers\FoodBeverageController;
use App\Http\Controllers\FoodBeverageAPIController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    Route::get('/xml-foodBeverages', [SitemapXmlController::class, 'xml_foodBeverages']);
    Route::get('/xml-orderDetails', [SitemapXmlController::class, 'xml_orderDetails']);
});
  //API for food beverages
  Route::get('api/foodBeverages/showAll',[FoodBeverageAPIController::class,'index']);
  Route::post('api/foodBeverages/create',[FoodBeverageAPIController::class,'store']);
  Route::get('api/foodBeverages/find/{id}',[FoodBeverageAPIController::class,'find']);
  Route::post('api/foodBeverages/find/{name}',[FoodBeverageAPIController::class,'findByName']);
  Route::post('api/foodBeverages/update/{id}',[FoodBeverageAPIController::class,'update']);
  Route::post('api/foodBeverages/delete/{id}',[FoodBeverageAPIController::class,'destroy']);

//////////////////////


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