<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Reports\{
    ReportOptionsController,
    ReportShopperController,
    ReportShopperGeneratePdfController
};

Route::middleware('auth')
    ->group(function() {

        Route::get(
            '/relatorios', 
            ReportOptionsController::class
        )
        ->name('pdfOptions_get');

        Route::get(
            '/relatorio/comprador', 
            ReportShopperController::class
        ) 
        ->name('pdfReportShopper_get');

        Route::post(
            '/relatorio/comprador', 
            ReportShopperController::class
        )
        ->name('pdfReportShopper_post');

        Route::post(
            '/relatorio/comprador/gerar', 
            ReportShopperGeneratePdfController::class
        )
        ->name('pdfReportShopperGenerate_post');
    });