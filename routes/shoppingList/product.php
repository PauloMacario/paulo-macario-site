<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingList\Product\{
    ShowAllProductsController,
    NewProductController,
    CreateProductController,
    DeleteProductController
};

Route::prefix('produtos')
    ->group(function() {

        Route::get(
            '/', 
            ShowAllProductsController::class
        )
        ->name('produtos_get');

        Route::get(
            '/novo-produto', 
            NewProductController::class
        )
        ->name('newprodutos_get');

        Route::post(
            '/novo-produto', 
            CreateProductController::class
        )
        ->name('createproduto_post');

        Route::post(
            '/produto', 
            DeleteProductController::class
        )
        ->name('deleteproduto_post');

        /*Route::get(
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


    


    

