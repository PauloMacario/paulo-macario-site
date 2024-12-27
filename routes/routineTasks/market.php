<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\Market\{
    NewMarketController,
    ShowAllMarketsController,
    CreateMarketController,
    ShowMarketController,
    UpdateMarketController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/loja', 
            NewMarketController::class
        )
        ->name('market_get');

        Route::get(
            '/lojas', 
            ShowAllMarketsController::class
        )
        ->name('markets_get');

        Route::post(
            '/loja', 
            CreateMarketController::class
        )
        ->name('market_post');

        Route::get(
            '/loja/{id}/detalhes', 
            ShowMarketController::class
        )
        ->name('detaiMarket_get');

        /* Route::post(
            '/loja/editar', 
            UpdateMarketController::class
        )
        ->name('updateMarket_post'); */
    }
);