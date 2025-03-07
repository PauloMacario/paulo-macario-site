<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\HomeAppInvestController;
use App\Http\Middleware\AppInvestModule;

Route::middleware('auth', 'appInvest')
    ->prefix('appinvest')
    ->group(function() {

        Route::get(
            '/home', 
            HomeAppInvestController::class
        )
        ->name('appInvest_Home');
    }
);