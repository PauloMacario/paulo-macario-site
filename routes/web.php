<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')
    ->group(function() {

        Route::get(
            '/home', 
            [HomeController::class, 'index']
        )
        ->name('home');

        Route::get(
            '/naoautorizado', 
            [HomeController::class, 'block']
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
include_once 'appInvest/negotiation.php';
include_once 'appInvest/settings.php';
include_once 'appInvest/typeinvestment.php';
include_once 'appInvest/segment.php';
include_once 'appInvest/investment.php';

/* Rota Cheap Beer */
include_once 'cheapBeer/beerprice.php';
