<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/products', [ProductController::class, 'index'])->name('index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::prefix('/api/v1/admin')->group(function () {
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');

});

Route::middleware('guest')->group( function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

});

Route::middleware('auth')->group(function() {
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
Route::get('/', function () {
    return view('home.index');
})->name('home');
//Route::get('/home', function () {
//    return view('home');
//});
Route::get('/admin', function () {
    return view('admin.login');
});
Route::post('/admin', function () {
    return 'hi, admin';
})->name('admin');
