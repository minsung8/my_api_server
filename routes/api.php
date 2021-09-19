<?php

use App\Http\Controllers\FruitController;
use App\Http\Middleware\CheckToken;
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

Route::get('/fruit/token', [FruitController::class, 'token']);

Route::middleware([CheckToken::class])->group(function () {
    Route::get('/fruit', [FruitController::class, 'index']);
    Route::get('/fruit/{name}', [FruitController::class, 'show']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
