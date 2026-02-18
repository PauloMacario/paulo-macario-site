<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingList\List\{
    ShowAllListsController,
    NewListController
};

Route::prefix('listas')
    ->group(function() {

        Route::get(
            '/', 
            ShowAllListsController::class
        )
        ->name('listas_get');

        Route::get(
            '/nova-lista', 
            NewListController::class
        )
        ->name('newList_get');

       /*  Route::post(
            '/categoria', 
            CreateCategoryController::class
        )
        ->name('category_post');

        Route::get(
            '/categoria/{id}/detalhes', 
            ShowCategoryController::class
        )
        ->name('detailCategory_get');

        Route::post(
            '/categoria/editar', 
            UpdateCategoryController::class
        )
        ->name('updateCategory_post');   */
    }
);


    


    

