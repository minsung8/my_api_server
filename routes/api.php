<?php

use App\Http\Controllers\FruitController;
use App\Http\Controllers\VegetableController;
use App\Http\Middleware\CheckToken;
use App\Models\Vegetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 과일 API 
Route::get('/product/token', [FruitController::class, 'token']);
Route::middleware([CheckToken::class])->group(function () {
    Route::get('/product/list', [FruitController::class, 'index']);
    Route::get('/product', [FruitController::class, 'show']);
});

// 채소 API
Route::get('/item/token', [VegetableController::class, 'token']);
Route::middleware([CheckToken::class])->group(function () {
    Route::get('/item/list', [VegetableController::class, 'index']);
    Route::get('/item', [VegetableController::class, 'show']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
