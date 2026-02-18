<?php

namespace App\Http\Controllers\ShoppingList\ListProduct;

use App\Http\Controllers\Controller;
use Rules\ShoppingList\ListProduct\GetListProductsById;
use Illuminate\Http\Request;

class EditListProductsController extends Controller
{
    public function __invoke(Request $request)
    {
        $context['listProducts'] = (new GetListProductsById($request->id))->execute();

        return view('shopping-list.list-products.edit', $context);
    }
}
