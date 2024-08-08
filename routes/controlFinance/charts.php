<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\{
    HomeController
};

Route::middleware('auth')
    ->group(function() {

        Route::get('/grafico/categorias', [HomeController::class, 'graphicPerCategories'])->name('grafico_categorias_get');

        Route::get('/grafico/categorias-divida-valor', [HomeController::class, 'graphicPerCategoriesDebtsSumValues'])->name('grafico_categorias_debts_sum_values_get');

    });