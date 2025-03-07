<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\TypeInvestment\{
    NewTypeInvestmentController,
    CreateTypeInvestmentController,
    ShowTypeInvestmentController,
    ShowAllTypeInvestmentsController,
    UpdateTypeInvestmentController,
    DeleteTypeInvestmentController
};

Route::middleware('auth', 'appInvest')
    ->prefix('appinvest')
    ->group(function() {
       
        Route::get('/tipos',
            ShowAllTypeInvestmentsController::class
        )
        ->name('typeInvestmentsAll_get');
        
        Route::get('/tipo',
            NewTypeInvestmentController::class
        )
        ->name('typeInvestmentsNew_get');

        Route::get('/tipos/filtros',
            ShowAllTypeInvestmentsController::class,
        )
        ->name('typeInvestmentsAllFilters_get');

        Route::get('/tipo/{id}/detalhes', 
            ShowTypeInvestmentController::class
        )
        ->name('typeInvestmentsShow_get');
        

        Route::post('/tipo', 
            CreateTypeInvestmentController::class
        )
        ->name('typeInvestmentsCreate_post');

        Route::post('/tipo/editar', 
            UpdateTypeInvestmentController::class
        )
        ->name('typeInvestmentsUpdate_post');
    });