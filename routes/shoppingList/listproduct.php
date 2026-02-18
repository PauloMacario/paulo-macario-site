<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingList\ListProduct\{
    GetListProductsController,
    UpdateListProductsController,
    EditListProductsController,
    UpdateAllListProductsController
};

Route::prefix('lista-produtos')
    ->group(function() {

        Route::get(
            '/lista/{id}', 
            GetListProductsController::class
        )
        ->name('lista_produtos_get');

        Route::post(
            '/atualiza', 
            UpdateListProductsController::class
        )
        ->name('lista_atualiza_post');

        Route::post(
            '/edita', 
            UpdateAllListProductsController::class
        )
        ->name('lista_atualiza_all_post');

        Route::get(
            '/lista/edit/{id}', 
            EditListProductsController::class
        )
        ->name('lista_edit_produtos_get');
    }
);


    


    

