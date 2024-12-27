<?php

namespace App\Http\Controllers\RoutineTasks\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('routine-tasks.category.new');
    }
}
