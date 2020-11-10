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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/cart/{id}', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::get('/coupon/{id}', [App\Http\Controllers\CartController::class, 'getCoupon'])->name('coupon');
Route::post('/coupon/{id}', [App\Http\Controllers\CartController::class, 'getCoupon'])->name('coupon');
