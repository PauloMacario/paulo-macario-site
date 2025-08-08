<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheapBeer\{
    BeerPriceController
};

Route::middleware('auth'/* , 'appInvest' */)
    ->prefix('cheapbeer')
    ->group(function() {

        Route::get('/beerprice',
            [BeerPriceController::class, 'getFormBeearPrice']
        )
        ->name('getFormBeearPrice_get');

        Route::post('/beerprice',
            [BeerPriceController::class, 'postFormBeearPrice']
        )
        ->name('postFormBeearPrice_get');

        Route::get('/ranking',
            [BeerPriceController::class, 'getRanking']
        )
        ->name('getRanking_get');

    });