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


/* Rota Routine Tasks */
include_once 'routineTasks/home.php';
include_once 'routineTasks/product.php';
include_once 'routineTasks/market.php';
include_once 'routineTasks/manageshoppinglists.php';
include_once 'routineTasks/shoppinglist.php';
include_once 'routineTasks/category.php';
