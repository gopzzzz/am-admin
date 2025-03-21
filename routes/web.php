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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/agent', [App\Http\Controllers\HomeController::class, 'agent'])->name('agent');
Route::get('/agentlist', [App\Http\Controllers\HomeController::class, 'agentlist'])->name('agentlist');
Route::post('/agentcreate', [App\Http\Controllers\HomeController::class, 'agentcreate'])->name('agentcreate');

Route::get('/customer', [App\Http\Controllers\HomeController::class, 'customer'])->name('customer');

Route::get('/size', [App\Http\Controllers\HomeController::class, 'size'])->name('size');

Route::post('/sizeinsert', [App\Http\Controllers\HomeController::class, 'sizeinsert'])->name('sizeinsert');

Route::post('/sizefetch', [App\Http\Controllers\HomeController::class, 'sizefetch'])->name('sizefetch');

Route::post('/sizeedit', [App\Http\Controllers\HomeController::class, 'sizeedit'])->name('sizeedit');
Route::get('/occasions', [App\Http\Controllers\HomeController::class, 'occasions'])->name('occasions');

Route::post('/occasiansinsert', [App\Http\Controllers\HomeController::class, 'occasiansinsert'])->name('occasiansinsert');

Route::post('/occasiansfetch', [App\Http\Controllers\HomeController::class, 'occasiansfetch'])->name('occasiansfetch');

Route::post('/occasiansedit', [App\Http\Controllers\HomeController::class, 'occasiansedit'])->name('occasiansedit');
Route::post('/orderstatusfetch', [App\Http\Controllers\HomeController::class, 'orderstatusfetch'])->name('orderstatusfetch');

Route::post('/orderstatusedit', [App\Http\Controllers\HomeController::class, 'orderstatusedit'])->name('orderstatusedit');

Route::get('/orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
