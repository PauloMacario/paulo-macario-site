<?php

namespace App\Http\Controllers\ShoppingList\Product;

use App\Http\Controllers\Controller;
use App\Models\ShoppingList\Category;
use Illuminate\Http\Request;

class NewProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $data['categories'] = Category::all();

        return view('shopping-list.product.new', $data);
    }
}
