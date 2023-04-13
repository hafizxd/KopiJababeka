<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customers/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');

    Route::get('/order/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

    Route::get('/payment/create/{orderId}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/store/{orderId}', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/notification/{paymentId}', [PaymentController::class, 'notify'])->name('payment.notification');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{id}/delete', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/reports/products', [OrderController::class, 'productReport'])->name('report.product');
});

require __DIR__.'/auth.php';
