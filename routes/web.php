<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\HomeControlFinanceController;

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')
    ->group(function() {

        Route::get(
            '/home', 
            [HomeControlFinanceController::class, 'index']
        )
        ->name('home');
    }
);

Auth::routes();

/* Rota Control Finance */
include_once 'controlFinance/home.php';
include_once 'controlFinance/category.php';
include_once 'controlFinance/debt.php';
include_once 'controlFinance/installment.php';
include_once 'controlFinance/paymenttype.php';
include_once 'controlFinance/settings.php';
include_once 'controlFinance/shopper.php';
include_once 'controlFinance/charts.php';
include_once 'controlFinance/payment.php';
include_once 'controlFinance/report.php';

/* Rota App Invest */
include_once 'appInvest/home.php';
