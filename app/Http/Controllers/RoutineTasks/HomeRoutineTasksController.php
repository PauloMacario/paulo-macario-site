<?php

namespace App\Http\Controllers\RoutineTasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeRoutineTasksController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('routine-tasks.home');
    }
}
