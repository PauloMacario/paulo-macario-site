<?php

namespace App\Http\Controllers\ShoppingList\Product;

use App\Http\Controllers\Controller;
use Rules\ShoppingList\Product\GetProducts;

class ShowAllProductsController extends Controller
{
    public function __invoke()
    {
        $context['products'] = (new GetProducts())->execute();

        return view('shopping-list.product.all', $context);
    }
}
