<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\PaymentType\{
    NewPaymentTypeController,
    CreatePaymentTypeController,
    ShowPaymentTypeController,
    UpdatePaymentTypeController,
};

Route::middleware('auth')
    ->group(function() {

        Route::get('/pagamento',
            NewPaymentTypeController::class
        )
        ->name('paymentType_get');

        Route::post('/pagamento',
            CreatePaymentTypeController::class
        )
        ->name('paymentType_post');

        Route::get('/pagamento/{id}/detalhes',
            ShowPaymentTypeController::class
        )
        ->name('detailPaymentType_get');

        Route::post('pagamento/editar',
            UpdatePaymentTypeController::class
        )
        ->name('updatePaymentType_post'); 
 
    }
);

    


    

