<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\HomeAppInvestController;

Route::middleware('auth')
    ->prefix('appinvest')
    ->group(function() {

        Route::get(
            '/home', 
            HomeAppInvestController::class
        )
        ->name('appInvestHome');
    }
);