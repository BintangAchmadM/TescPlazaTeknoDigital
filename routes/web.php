<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PieChartController;
use App\Http\Controllers\LineChartController;
use App\Http\Controllers\BarChartController;
use App\Http\Controllers\DashboardController;

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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/line-chart', [LineChartController::class, 'index']);


Route::get('pie-chart', [PieChartController::class, 'index']);

Route::get('/bar-chart', [BarChartController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});
