<?php

namespace Rules\ShoppingList\Product;

use App\Models\ShoppingList\ListProduct;
use App\Models\ShoppingList\Product;

class DeleteProduct
{

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {   
        $listProducts = ListProduct::where('product_id', $this->id)->get();
        
        foreach ($listProducts as $listProduct) {
            $listProduct->delete();
        }

        return Product::destroy($this->id);
    }
}