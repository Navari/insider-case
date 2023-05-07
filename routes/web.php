<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\League\ResetLeagueController;
use App\Http\Controllers\League\ShowLeagueController;
use App\Http\Controllers\League\SimulationLeagueController;
use App\Http\Controllers\League\StartLeagueController;
use App\Http\Controllers\League\StoreLeagueController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/league/')->name('league.')->group(function () {

    Route::post('/', StoreLeagueController::class)->name('store');

    Route::get('/start/{league}/', StartLeagueController::class)
        ->middleware('signed')
        ->name('start');

    Route::get('/{league}/', ShowLeagueController::class)
        ->name('show');

    Route::get('/simulate/{league}/{week?}', SimulationLeagueController::class)
        ->middleware('signed')
        ->name('simulate');

    Route::get('/reset/{league}/', ResetLeagueController::class)
        ->middleware('signed')
        ->name('reset');

});

