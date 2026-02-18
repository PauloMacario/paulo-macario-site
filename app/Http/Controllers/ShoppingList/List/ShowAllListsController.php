<?php

namespace App\Http\Controllers\ShoppingList\List;

use App\Http\Controllers\Controller;
use Rules\ShoppingList\List\GetLists;

class ShowAllListsController extends Controller
{
    public function __invoke()
    {
        $context['lists'] = (new GetLists())->execute();

        return view('shopping-list.list.all', $context);
    }
}
