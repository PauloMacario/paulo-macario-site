<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Shopper\{
    NewShopperController,
    CreateShopperController,
    ShowShopperController,
    UpdateShopperController
};

Route::middleware('auth')
    ->prefix('controlfinance')
    ->group(function() {

         Route::get('/comprador',
            NewShopperController::class
        )
        ->name('shopper_get');

        Route::post('/comprador',
            CreateShopperController::class
        )
        ->name('shopper_post');

        Route::get('/comprador/{id}/detalhes',
            ShowShopperController::class
        )
        ->name('detailShopper_get');

        Route::post('/comprador/editar',
            UpdateShopperController::class
        )
        ->name('updateShopper_post'); 
    }
);

    


    

