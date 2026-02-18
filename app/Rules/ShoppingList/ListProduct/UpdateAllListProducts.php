<?php

namespace Rules\ShoppingList\ListProduct;

use App\Models\ShoppingList\ListProduct;

class UpdateAllListProducts
{
    protected $data;

    public function __construct(array $data) {
        $this->data = $data;

        dd($data);
    }

    public function execute()
    {
        $listProducts = ListProduct::where('id', $this->data['id'])
            ->first();
            
        return $listProducts->update([
            'quantity' => $this->data['quantity'],
            'price' => $this->data['price'],
            'purchased' => $this->data['purchased']
        ]);
    }
}