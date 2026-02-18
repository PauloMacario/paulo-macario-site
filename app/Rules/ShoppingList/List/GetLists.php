<?php

namespace Rules\ShoppingList\List;

use App\Models\ShoppingList\Lists;

class GetLists
{
    public function execute()
    {
        return Lists::all();
    }
}