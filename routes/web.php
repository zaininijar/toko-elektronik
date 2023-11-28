<?php

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
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::post('order', [CustomerOrderController::class, 'store'])->name('customer.create-order');

    // api
    Route::post('shopping-chart/{product}', [CustomerShoppingChart::class, 'store'])->name('customer.create-shopping-chart');
});


// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);

    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
});
