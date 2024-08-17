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
    }
);

Auth::routes();


include_once 'controlFinance/home.php';
include_once 'controlFinance/category.php';
include_once 'controlFinance/debt.php';
include_once 'controlFinance/installment.php';
include_once 'controlFinance/paymenttype.php';
include_once 'controlFinance/settings.php';
include_once 'controlFinance/shopper.php';
include_once 'controlFinance/charts.php';
include_once 'controlFinance/payment.php';
include_once 'controlFinance/relatorio.php';
