<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\HomeControlFinanceController;

Route::middleware('auth')
    ->prefix('controlfinance')
    ->group(function() {

        Route::get('/grafico/categorias', [HomeControlFinanceController::class, 'graphicPerCategories'])->name('grafico_categorias_get');

        Route::get('/grafico/categorias-divida-valor', [HomeControlFinanceController::class, 'graphicPerCategoriesDebtsSumValues'])->name('grafico_categorias_debts_sum_values_get');

    });