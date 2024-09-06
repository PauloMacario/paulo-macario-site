<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Category\{
    NewCategoryController,
    CreateCategoryController,
    ShowCategoryController,
    UpdateCategoryController
};

Route::middleware('auth')
    ->prefix('controlfinance')
    ->group(function() {

        Route::get(
            '/categoria', 
            NewCategoryController::class
        )
        ->name('category_get');

        Route::post(
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
        ->name('updateCategory_post');  
    }
);


    


    

