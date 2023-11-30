<?php

use App\Http\Controllers\Admin\CutomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\ShoppingChart as CustomerShoppingChart;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [CustomerProductController::class, 'index'])->name('customer.product');
Route::get('/product/{id}', [CustomerProductController::class, 'show'])->name('customer.product.show');


// customer
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:customer']], function () {
    Route::post('order', [CustomerOrderController::class, 'store'])->name('customer.create-order');
    Route::get('orders', [CustomerOrderController::class, 'index'])->name('customer.order');
    Route::get('shopping-chart', [CustomerShoppingChart::class, 'index'])->name('customer.shopping-chart');
    Route::delete('shopping-chart/{id}', [CustomerShoppingChart::class, 'destroy'])->name('customer.shopping-chart.destroy');
    // api
    Route::post('shopping-chart/{product}', [CustomerShoppingChart::class, 'store'])->name('customer.create-shopping-chart');
});


// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified', 'role:admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('customer', [CutomerController::class, 'index'])->name('customer');
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::put('order/updatePayment/{payment}', [OrderController::class, 'updatePayment'])->name('order.updatePayment');
});