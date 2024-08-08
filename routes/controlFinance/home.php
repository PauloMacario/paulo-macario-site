<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\HomeControlFinanceController;

Route::middleware('auth')
    ->group(function() {

        Route::get(
            '/controlfinance/home', 
            [HomeControlFinanceController::class, 'index']
        )
        ->name('controlFinanceHome');
    }
);