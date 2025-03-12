<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Reports\{
    ReportOptionsController,
    ReportMonthController,
    ReportMonthGeneratePdfController,
    ReportAllController,
    ReportAllGeneratePdfController
};

Route::middleware(['auth', 'shopper.exist'])
    ->prefix('controlfinance')
    ->group(function() {

        Route::get(
            '/relatorios', 
            ReportOptionsController::class
        )
        ->name('pdfOptions_get');

        Route::get(
            '/relatorio/mes', 
            ReportMonthController::class
        ) 
        ->name('pdfReportMonth_get');

        Route::post(
            '/relatorio/mes', 
            ReportMonthController::class
        )
        ->name('pdfReportMonth_post');

        Route::post(
            '/relatorio/mes/gerar', 
            ReportMonthGeneratePdfController::class 
        )
        ->name('pdfReportMonthGenerate_post');

        Route::get(
            '/relatorio/todos',
            ReportAllController::class
        ) 
        ->name('pdfReportAll_get');

        Route::post(
            '/relatorio/todos', 
            ReportAllController::class
        )
        ->name('pdfReportAll_post');

        Route::post(
            '/relatorio/todos/gerar', 
            ReportAllGeneratePdfController::class
        )
        ->name('pdfReportMonthGenerate_po');
    });