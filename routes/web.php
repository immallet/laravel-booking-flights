<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserFlightController;

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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->prefix('vuelos')->group(function () {
    Route::get('/', [FlightController::class, 'index'])->name('vuelos');
    Route::get('/{id}', [FlightController::class, 'show'])->name('vuelos.show');
});

Route::middleware('auth')->prefix('vuelos-usuario')->group(function () {
    Route::get('/', [UserFlightController::class, 'index'])->name('vuelos-usuario');
    Route::get('/{id}', [UserFlightController::class, 'show'])->name('vuelos-usuario.show');
    Route::post('/store/{flight_id}', [UserFlightController::class, 'store'])->name('vuelos-usuario.store');
    Route::post('/update/{userflight_id}', [UserFlightController::class, 'update'])->name('vuelos-usuario.update');
    Route::post('/delete/{userflight_id}', [UserFlightController::class, 'destroy'])->name('vuelos-usuario.delete');
});

// Route::resource('vuelos-usuario', FlightController::class)->missing(function (Request $request) {
//     return Redirect::route('vuelos-usuario.index');
// })->middleware('auth');
