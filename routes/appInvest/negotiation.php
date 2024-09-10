<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\Negotiation\ShowAllNegotiationsController;

Route::middleware('auth')
    ->prefix('appinvest')
    ->group(function() {
        /* Route::get('/negotiation',
            NewDebtController::class
        )
        ->name('debt_get');

        Route::post('/negotiation', 
            CreateDebtController::class
        ) 
        ->name('debt_post');*/
        
        Route::get('/negociacoes',
            ShowAllNegotiationsController::class
        )
        ->name('negotiationAll_get');
    });