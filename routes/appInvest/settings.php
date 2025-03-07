<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppInvest\Settings\{
    ShowSettingsAppInvestController,
    ShowSettingsInitialAppInvestController  
};

Route::middleware('auth')
    ->prefix('appinvest')
    ->group(function() {

        Route::get('/config',
            ShowSettingsInitialAppInvestController::class
            )
            ->name('settingsAppInvest_get');    
    }
);

    


    

