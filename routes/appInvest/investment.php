<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\Investment\{
    NewInvestmentController,
    CreateInvestmentController,
    ShowInvestmentController,
    ShowAllInvestmentsController,
    UpdateInvestmentController,
    DeleteInvestmentController
};

Route::middleware('auth', 'appInvest')
    ->prefix('appinvest')
    ->group(function() {
       
        Route::get('/investimentos',
            ShowAllInvestmentsController::class
        )
        ->name('investmentsAll_get');
        
        Route::get('/investimento',
            NewInvestmentController::class
        )
        ->name('investmentsNew_get');

        Route::get('/investimentos/filtros',
            ShowAllInvestmentsController::class,
        )
        ->name('investmentsAllFilters_get');

        Route::get('/investimento/{id}/detalhes', 
            ShowInvestmentController::class
        )
        ->name('investmentsShow_get');
        

        Route::post('/investimento', 
            CreateInvestmentController::class
        )
        ->name('investmentsCreate_post');

        Route::post('/investimento/editar', 
            UpdateInvestmentController::class
        )
        ->name('investmentsUpdate_post');
    });