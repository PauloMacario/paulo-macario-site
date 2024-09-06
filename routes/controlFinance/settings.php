<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlFinance\Settings\{
    ShowAllSettingsController
  
};

Route::middleware('auth')
    ->prefix('controlfinance')
    ->group(function() {

        Route::get('/config',
            ShowAllSettingsController::class
        )
        ->name('settingAll_get');    
    }
);

    


    

