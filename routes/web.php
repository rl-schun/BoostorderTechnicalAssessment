<?php

use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('productList/{pageNum?}', [CatalogueController::class, 'index'])->name('index');

Route::get('cart', [OrderController::class, 'getCart'])->name('getCart');
Route::post('cart', [OrderController::class, 'addCart'])->name('addCart');

Route::get('mycart', function () {
    return view('cart');
});
Route::post('createorder', [OrderController::class, 'createOrder'])->name('createOrder');
Route::get('order', [OrderController::class, 'getOrderList'])->name('getOrderList');
Route::get('admin', function () {
    return view('admin');
});
Route::post('orderstatus', [OrderController::class, 'updateOrderStatus'])->name('updateOrderStatus');
Route::get('notification', [OrderController::class, 'getNotificationCount'])->name('getNotificationCount');