<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Installment\{
    ShowAllInstallmentsController,
    ShowInstallmentController,
    UpdateInstallmentController,
    DeleteInstallmentController
};

Route::middleware('auth')
    ->group(function() {

        Route::get('/parcelas',
            ShowAllInstallmentsController::class,
        )
        ->name('installmentAll_get');
        
        Route::get('/parcelas/filtros',
            ShowAllInstallmentsController::class,
        )
        ->name('installmentAllFilters_post');
        
        Route::get('/parcela/{id}/detalhes',
            ShowInstallmentController::class,
        )
        ->name('detailInstallment_get');
        
        Route::post('parcela/editar',
            UpdateInstallmentController::class,
        )
        ->name('updateInstallment_post'); 
        
        Route::post('parcela/delete',
            DeleteInstallmentController::class,
        )
        ->name('deleteInstallment_post'); 
    
    }
);

    


    

