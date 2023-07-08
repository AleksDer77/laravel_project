<?php

use App\Http\Controllers\HealthcheckController;
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

Route::get('/v1/healthcheck', [HealthcheckController::class, 'index']);

Route::get('v1/products', function () {
    return Product::query()->first();
});
