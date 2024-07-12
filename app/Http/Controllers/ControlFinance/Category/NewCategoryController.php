<?php

namespace App\Http\Controllers\ControlFinance\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewCategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('control-finance.category.new');
    }
}
