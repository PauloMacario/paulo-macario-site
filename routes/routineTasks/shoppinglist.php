<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\ShoppingList\{
    NewShoppingListController,
    ShowAllShoppingListsController,
    CreateShoppingListController,
    ShowShoppingListController,
    UpdateShoppingListController
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
            ShowAllShoppingListsController::class
        )
        ->name('shopping_lists_get');

        Route::post(
            '/lista', 
            CreateShoppingListController::class
        )
        ->name('shopping_list_post');

        Route::get(
            '/produto/{id}/detalhes', 
            ShowShoppingListController::class
        )
        ->name('detailProduct_get');

        Route::post(
            '/produto/editar', 
            UpdateShoppingListController::class
        )
        ->name('updateProduct_post');
    }
);