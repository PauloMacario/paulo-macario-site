<?php

namespace Rules\ShoppingList\ListProduct;

use App\Models\ShoppingList\ListProduct;
use stdClass;

class GetListProductsById
{
    protected $listId;

    public function __construct(int $listId) {
        $this->listId = $listId;
    }

    public function execute()
    {
        return ListProduct::where('list_id', $this->listId)
            ->join('lists', 'lists.id', '=', 'list_products.list_id')          
            ->join('products', 'products.id', '=', 'list_products.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                'list_products.id',
                'list_products.quantity',
                'list_products.price',
                'list_products.purchased',
                'list_products.included',
                'list_products.list_id',
                'lists.name AS list_name',
                'list_products.product_id',
                'products.name AS product_name',
                'products.category_id',
                'categories.name AS category_name'
            )
            ->get();
    }
}