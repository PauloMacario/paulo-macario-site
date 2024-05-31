<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControlFinance\DebtController;
use App\Http\Controllers\ControlFinance\InstallmentController;
use App\Http\Controllers\ControlFinance\ParameterController;

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
    '/divida', [DebtController::class, 'newDebt']
    )->name('debt_get');

Route::post(
        '/divida', [DebtController::class, 'postDebt']
        )->name('debt_post');

Route::get(
    '/dividas', [DebtController::class, 'getAllDebts']
    )->name('debtAll_get');

Route::post(
    '/dividas/mes', [DebtController::class, 'getAllDebts']
    )->name('debtAllMonth_post');


Route::post(
    '/divida/parcelada', [DebtController::class, 'postInstallmentDebt']
    )->name('installmentAllMonth_post');



Route::get(
    '/parcelas', [InstallmentController::class, 'getAllInstallments']
    )->name('installmentAll_get');

Route::post(
    '/parcelas/mes', [InstallmentController::class, 'getAllInstallments']
    )->name('installmentAllMonth_post');

Route::post(
    '/parametro', [ParameterController::class, 'postParam']
    )->name('parameter_post');
