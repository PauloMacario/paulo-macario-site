<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\Segment\{
    NewSegmentController,
    CreateSegmentController,
    ShowSegmentController,
    ShowAllSegmentsController,
    UpdateSegmentController
};

Route::middleware('auth', 'appInvest')
    ->prefix('appinvest')
    ->group(function() {
       
        Route::get('/seguimentos',
            ShowAllSegmentsController::class
        )
        ->name('segmentsAll_get');

        Route::get('/seguimentos/filtros',
            ShowAllSegmentsController::class,
        )
        ->name('segmentsAllFilters_get');

        Route::get('/seguimento/{id}/detalhes', 
            ShowSegmentController::class
        )
        ->name('segmentsShow_get');
        
        Route::get('/seguimento',
            NewSegmentController::class
        )
        ->name('segmentsNew_get');

        Route::post('/seguimento', 
            CreateSegmentController::class
        )
        ->name('segmentsCreate_post');

        Route::post('/seguimento/editar', 
            UpdateSegmentController::class
        )
        ->name('segmentsUpdate_post');
    });