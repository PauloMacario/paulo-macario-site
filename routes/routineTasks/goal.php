<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\Goal\{
    NewGoalController,
    CreateGoalController,
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {
        Route::get('/meta',
            NewGoalController::class
            )
            ->name('goal_get');

        Route::post('/meta',
            CreateGoalController::class
            )
            ->name('goal_get');
    });