<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

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
        ->name('naoautorizado');
    }
);

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

/* Rota Shopping List */
include_once 'shoppingList/list.php';
include_once 'shoppingList/product.php';
include_once 'shoppingList/listproduct.php';