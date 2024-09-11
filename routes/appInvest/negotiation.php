<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\Negotiation\ShowAllNegotiationsController;

Route::middleware('auth')
    ->prefix('appinvest')
    ->group(function() {
       
        Route::get('/negociacoes',
            ShowAllNegotiationsController::class
        )
        ->name('negotiationAll_get');

        Route::get('/negociacoes/filtros',
            ShowAllNegotiationsController::class,
        )
        ->name('negotiationAllFilters_get');
    });