<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\FlightController;
 
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::middleware('auth')
    ->group(function()
    {
        Route::get('/flights/booking', [FlightController::class, 'booking'])->name('flights.booking');
        Route::post('/flights/booking', [FlightController::class, 'store'])->name('flights.store');
        Route::resource('/flights', FlightController::class);
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    });

    Route::middleware('secure')
    ->group(function()
    {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    });

Route::get('/support', [HomeController::class, 'support']);
