<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\ShoppingList\{
    NewShoppingListController,
    ShowAllShoppinglistsController,
    CreateShoppinglistController,
    ShowShoppinglistController,
    UpdateShoppinglistController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/lista', 
            NewShoppingListController::class
        )
        ->name('shopping_list_get');
        
        Route::get(
            '/listas', 
            ShowAllShoppinglistsController::class
        )
        ->name('shopping_lists_get');

        Route::post(
            '/lista', 
            CreateShoppinglistController::class
        )
        ->name('shopping_list_post');

        Route::get(
            '/produto/{id}/detalhes', 
            ShowShoppinglistController::class
        )
        ->name('detailProduct_get');

        Route::post(
            '/produto/editar', 
            UpdateShoppinglistController::class
        )
        ->name('updateProduct_post');
    }
);