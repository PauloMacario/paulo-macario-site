<?php

namespace App\Http\Controllers\ShoppingList\ListProduct;

use App\Http\Controllers\Controller;
use Rules\ShoppingList\ListProduct\GetListProducts;
use Illuminate\Http\Request;

class GetListProductsController extends Controller
{
    public function __invoke(Request $request)
    {
        $context['listProducts'] = (new GetListProducts($request->id))->execute();

        return view('shopping-list.list-products.products', $context);
    }
}
