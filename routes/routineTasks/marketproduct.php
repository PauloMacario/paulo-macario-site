<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\MarketProduct\{
    ManagerMarketProductsController,
    UpdateMarketProductsController,
    MarketProductsController,
    CreateMarketProductsController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/mercadoprodutos', 
            ManagerMarketProductsController::class
        )
        ->name('market_products_get');

        Route::post(
            '/mercadoprodutos', 
            UpdateMarketProductsController::class
        )
        ->name('market_products_post');

        Route::get(
            '/listadecompras', 
            MarketProductsController::class
        )
        ->name('list_market_products_get');

        Route::post(
            '/listadecompras', 
            CreateMarketProductsController::class
        )
        ->name('create_market_products_post');
    }
);