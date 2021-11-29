<?php

use App\Http\Controllers\Calculus\CalculusController;
use App\Http\Controllers\Log\LogController;
use App\Http\Controllers\Statistics\StatisticsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/calculus')->group( function(){
    Route::post('/calculate', [CalculusController::class, 'calculate']);    
});

Route::prefix('/statistics')->group( function(){
    Route::post('/calculate', [StatisticsController::class, 'calculate']);
});

Route::prefix('/log')->group( function(){
    Route::post('/show', [LogController::class, 'show']);
    Route::delete('/{id}', [LogController::class, 'destroy'])->name('log.destroy');
});


