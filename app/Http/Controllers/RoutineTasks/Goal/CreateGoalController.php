<?php

namespace App\Http\Controllers\RoutineTasks\Goal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateGoalController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        dd($request->all());
    }
}
