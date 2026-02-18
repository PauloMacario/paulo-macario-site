<?php

namespace Rules\ShoppingList\Product;

use App\Models\ShoppingList\Product;

class GetProducts
{
    public function execute()
    {
        return Product::where('id','>',0)->with('category')->get();
    }
}