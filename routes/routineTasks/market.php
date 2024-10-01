<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\Market\{
    NewMarketController,
    ShowAllMarketsController,
    CreateMarketController,
    ShowMarketController,
    UpdateMarketController
};

Route::prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/mercado', 
            NewMarketController::class
        )
        ->name('market_get');

        Route::get(
            '/mercados', 
            ShowAllMarketsController::class
        )
        ->name('markets_get');

        Route::post(
            '/mercado', 
            CreateMarketController::class
        )
        ->name('market_post');

        Route::get(
            '/mercado/{id}/detalhes', 
            ShowMarketController::class
        )
        ->name('detaiMarket_get');

        Route::post(
            '/mercado/editar', 
            UpdateMarketController::class
        )
        ->name('updateMarket_post');
    }
);