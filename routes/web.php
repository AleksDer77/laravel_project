<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::get('api/v1/session', [SessionController::class, 'setSession']);
Route::get('api/v1/session_refresh', [SessionController::class, 'refreshSession']);

Route::prefix('/api/v1/admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');

});

Route::get('/form', function () {
    return view('form');
});
//Route::post('/form', function (Request $request) {
//    return $request->only('name', 'image');
//})->name('form.form');
Route::post('/form', function () {
    session(['id'=>3, 'name'=>'hello']);
    $session = session()->all();

    dd($session);
})->name('form.form');
