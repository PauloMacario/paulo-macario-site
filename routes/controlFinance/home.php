<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\HomeControlFinanceController;

Route::middleware('auth')
    ->prefix('controlfinance')
    ->group(function() {

        Route::get(
            '/home', 
            [HomeControlFinanceController::class, 'index']
        )
        ->name('controlFinanceHome');
    }
);