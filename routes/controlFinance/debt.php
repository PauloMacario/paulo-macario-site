<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Debt\{
    NewDebtController,
    CreateDebtController,
    ShowDebtController,
    ShowAllDebtController,
    UpdateDebtController,
    DeleteDebtController
};

Route::middleware(['auth', 'shopper.exist'])
    ->prefix('controlfinance')
    ->group(function() {
            
        Route::get('/divida',
            NewDebtController::class
        )
        ->name('debt_get');

        Route::post('/divida', 
            CreateDebtController::class
        )
        ->name('debt_post');
        
        Route::get('/dividas',
            ShowAllDebtController::class
        )
        ->name('debtAll_get');
        
        Route::get('/dividas/filtros',
            ShowAllDebtController::class
        )
        ->name('debtAllMonth_post');      

        Route::get('/divida/{id}/detalhes',
            ShowDebtController::class
        )
        ->name('detailDebt_get');
        
        Route::post('/divida/editar',
            UpdateDebtController::class
        )
        ->name('updateDebt_post'); 
        
        Route::post('/divida/delete',
            DeleteDebtController::class
        )
        ->name('deleteDebt_post'); 
    
    }
);

    


    

