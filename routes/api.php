<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HealthcheckController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('v1/products', [ProductController::class, 'index'])->name('products');
Route::get('v1/products/{id}', [ProductController::class, 'show'])->name('show.products');
Route::post('v1/products', [ProductController::class, 'store']);

Route::get('v1/users/{id}', [UserController::class, 'show'])->name('show.users');
Route::get('v1/users/{id}/orders', [OrderController::class, 'index'])->name('show.users');

Route::prefix('v1/admin/')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('index');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::put('product/{id}', [ProductController::class, 'update'])->name('product.update');

});

