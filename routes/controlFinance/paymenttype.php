<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\PaymentType\{
    NewPaymentTypeController,
    CreatePaymentTypeController,
    ShowPaymentTypeController,
    UpdatePaymentTypeController,
};

Route::middleware(['auth', 'shopper.exist'])
    ->prefix('controlfinance')
    ->group(function() {

        Route::get('/tipo-pagamento',
            NewPaymentTypeController::class
        )
        ->name('paymentType_get');

        Route::post('/tipo-pagamento',
            CreatePaymentTypeController::class
        )
        ->name('paymentType_post');

        Route::get('/tipo-pagamento/{id}/detalhes',
            ShowPaymentTypeController::class
        )
        ->name('detailPaymentType_get');

        Route::post('/tipo-pagamento/editar',
            UpdatePaymentTypeController::class
        )
        ->name('updatePaymentType_post'); 
 
    }
);

    


    

