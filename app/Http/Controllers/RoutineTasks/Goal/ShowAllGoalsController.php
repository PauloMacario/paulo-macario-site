<?php

namespace App\Http\Controllers\RoutineTasks\Goal;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Goal;
use Illuminate\Http\Request;

class ShowAllGoalsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['goals'] = Goal::all();

        return view('routine-tasks.goal.all', $data);
    }
}
