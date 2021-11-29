<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Log\LogController;
use App\Http\Controllers\Calculus\CalculusController;
use App\Http\Controllers\Statistics\StatisticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/calculus', [CalculusController::class,'index'])->name('calculus.index');

Route::get('/statistics', [StatisticsController::class,'index'])->name('statistics.index');

Route::get('/log', [LogController::class,'index'])->name('log.index');


Route::get('/', function () {
    return view('statistics.index');
});
