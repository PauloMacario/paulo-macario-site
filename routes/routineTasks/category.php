<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\Category\{
    NewCategoryController,
    ShowAllCategoriesController,
    CreateCategoryController,
    ShowCategoryController,
    UpdateCategoryController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/categoria', 
            NewCategoryController::class
        )
        ->name('category_task_get');
        
        Route::get(
            '/categorias', 
            ShowAllCategoriesController::class
        )
        ->name('categories_task_get');

        Route::post(
            '/categoria', 
            CreateCategoryController::class
        )
        ->name('category_task_post');

        Route::get(
            '/categoria/{id}/detalhes', 
            ShowCategoryController::class
        )
        ->name('detailcategory_task_get');

        Route::post(
            '/categoria/editar', 
            UpdateCategoryController::class
        )
        ->name('updatecategory_task_post');
    }
);