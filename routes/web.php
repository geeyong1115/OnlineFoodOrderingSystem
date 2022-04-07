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

Route::get('/', function () {
    return view('welcome');
});
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