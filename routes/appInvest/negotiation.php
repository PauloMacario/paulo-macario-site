<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\Negotiation\{
    ShowAllNegotiationsController,
    NewNegotiationController,
    CreateNegotiationController,
    ShowNegotiationController,
    UpdateNegotiationController
};

Route::middleware('auth', 'appInvest')
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

        Route::get('/negociacao/{id}/detalhes', 
            ShowNegotiationController::class
        )
        ->name('negotiationShow_get');
        
        Route::get('/negociacao',
            NewNegotiationController::class
        )
        ->name('negotiationNew_get');

        Route::post('/negociacao', 
            CreateNegotiationController::class
        )
        ->name('negotiationCreate_post');

        Route::post('/negociacao/editar', 
            UpdateNegotiationController::class
        )
        ->name('negotiationUpdate_post');
    });