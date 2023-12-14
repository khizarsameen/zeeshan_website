<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderManagmentController;
use App\Http\Controllers\TestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);


Route::middleware(['auth'])->group(function () {
    // Route::get('home', function () {
    //     return view('home');
    // });
    
    Route::get('redirect', [HomeController::class, 'redirect']);
    Route::resource('items', ItemController::class);
    Route::get('order/billing', [OrderController::class, 'orderBilling'])->name('order.billing');
    Route::resource('orders', OrderController::class);
    Route::post('cartqty/increment', [CartController::class, 'incrementQty'])->name('cartqty.increment');
    Route::post('cartqty/decrement', [CartController::class, 'decrementQty'])->name('cartqty.decrement');
    Route::get('cartitems/get', [CartController::class, 'getItems'])->name('cartitems.get');
    Route::get('completeorder', [OrderController::class, 'orderCompleted'])->name('completeorder');

    Route::get('orderslist', [OrderManagmentController::class, 'ordersList'])->name('orderslist');
    Route::get('vieworder', [OrderManagmentController::class, 'viewOrder'])->name('view.order');

    Route::resource('admin-users', AdminUserController::class);

    
    Route::post('update/dlvrystatus', [OrderManagmentController::class, 'updateDlvryStatus'])->name('update.dlvrystatus');
    



});
Route::get('aboutus', function() {
    return view('home.aboutus');
})->name('aboutus');

Route::get('allitems/get', [ItemController::class, 'getAllItems'])->name('allitems.get');

Route::get('product_details/{id}', [HomeController::class, 'product_details']);
Route::get('add/tocart', [HomeController::class, 'addToCart'])->name('add.tocart');
Route::resource('cart', CartController::class);
