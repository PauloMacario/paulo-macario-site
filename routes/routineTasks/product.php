<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\Product\{
    NewProductController,
    ShowAllProductsController,
    CreateProductController,
    ShowProductController,
    UpdateProductController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/produto', 
            NewProductController::class
        )
        ->name('product_get'); 

        Route::get(
            '/produtos', 
            ShowAllProductsController::class
        )
        ->name('products_get');

        Route::post(
            '/produto', 
            CreateProductController::class
        )
        ->name('product_post');

        Route::get(
            '/produto/{id}/detalhes', 
            ShowProductController::class
        )
        ->name('detailProduct_get');

        Route::post(
            '/produto/editar', 
            UpdateProductController::class
        )
        ->name('updateProduct_post');  
    }
);