<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControlFinance\DebtController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get(
    '/home', [HomeController::class, 'index']
    )->name('home');

Route::get(
    '/divida', [DebtController::class, 'index']
    )->name('debt.get');

Route::post(
    '/divida', [DebtController::class, 'postDebt']
    )->name('debt.post');

Route::post(
    '/divida/parcelada', [DebtController::class, 'postInstallmentDebt']
    )->name('installmentDebt.post');
