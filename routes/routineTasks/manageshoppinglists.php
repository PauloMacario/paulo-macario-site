<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\ManagerShoppingList\{
    ShowAllManagerShoppingListsController,
    ManagerShoppingListProductController,
    ManagerShoppingListProductPostController
};
use App\Http\Controllers\RoutineTasks\MarketProduct\{
    MarketProductsController,
    CreateMarketProductsController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/gerenciar-listas', 
            ShowAllManagerShoppingListsController::class
        )
        ->name('manage_lists_get');

        Route::get(
            '/gerenciar-produtos/{shoppingListId}', 
            ManagerShoppingListProductController::class
        )
        ->name('add_remove_manage_lists_get');

        Route::post(
            '/gerenciar-produtos', 
            ManagerShoppingListProductPostController::class
        )
        ->name('market_products_post');

        Route::get(
            '/listadecompras/{shoppingListId}', 
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