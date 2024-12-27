<?php

namespace App\Http\Controllers\RoutineTasks\Category;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Category;
use Illuminate\Http\Request;

class ShowAllCategoriesController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['categories'] = Category::all();

        return view('routine-tasks.category.all', $data);
    }
}
