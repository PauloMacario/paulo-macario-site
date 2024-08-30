<?php

namespace App\Http\Controllers\ControlFinance\Category;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;

class ShowCategoryController extends Controller
{
    public function __invoke($id)
    {
        $data['category'] = Category::find($id);

        return view('control-finance.category.detail', $data);
    }
}
