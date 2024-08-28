<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Payment\{
    PaymentRecurseListController,
    ShowAllPayInstallmentsController,
    PayOneInstallmentController,
    PayLotInstallmentsController,
    ShowAllPayTypesController,
    SaveAllPayTypesController
};

Route::middleware('auth')
    ->group(function() {

        Route::get(
            '/pagamento', 
            PaymentRecurseListController::class
        )
        ->name('paymentAll_get');

        Route::get(
            '/pagamento/parcelas', 
            ShowAllPayInstallmentsController::class
        )
        ->name('paymentAllInstallments_get');

        Route::post(
            '/pagamento/parcela', 
            PayOneInstallmentController::class
        )
        ->name('paymentPayOneInstallment_post');
        
        Route::post(
            '/pagamento/parcela/lote', 
            PayLotInstallmentsController::class
        )
        ->name('paymentPayLotInstallmentsController_post');

        Route::get(
            '/pagamento/tipo', 
            ShowAllPayTypesController::class
        )
        ->name('paymentAllPaymentTypesSearch_get');

        Route::post(
            '/pagamento/tipo/busca', 
            ShowAllPayTypesController::class
        )
        ->name('paymentAllPaymentTypesSearch_post');

        Route::post(
            '/pagamento/tipo/', 
            SaveAllPayTypesController::class
        )
        ->name('paymentAllPaymentTypes_post');
    });


    