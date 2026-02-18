<?php

namespace App\Http\Controllers\ShoppingList\List;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewListController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('shopping-list.list.new');
    }
}
