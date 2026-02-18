<?php

namespace Rules\ShoppingList\Product;

use App\Models\ShoppingList\Product;

class CreateProduct
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        return Product::create($this->data);
    }
}