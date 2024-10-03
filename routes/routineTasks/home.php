<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\HomeRoutineTasksController;
//use App\Http\Middleware\AppInvestModule;

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {

        Route::get(
            '/home', 
            HomeRoutineTasksController::class
        )
        ->name('routineTaskHome');
    }
);