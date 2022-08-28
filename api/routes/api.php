<?php

use App\Http\Controllers\Api\ConversionController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\PairsController;
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
Route::get('/ping', function () {
    return response('The service is functional', 200)->header('Content-Type', 'text/plain');
});
Route::resource('currencies', CurrencyController::class);
Route::resource('pairs', PairsController::class);
Route::get('convert', [ConversionController::class, 'converter']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
