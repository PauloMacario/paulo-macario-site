<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Payment\{
    PaymentRecurseListController,
    ShowAllPayInstallmentsController,
    PayOneInstallmentController,
    PayLotInstallmentsController,
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
    });