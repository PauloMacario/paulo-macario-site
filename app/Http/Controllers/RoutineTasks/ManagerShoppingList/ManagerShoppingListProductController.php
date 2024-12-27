<?php

namespace App\Http\Controllers\RoutineTasks\ManagerShoppingList;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Category;
use App\Models\RoutineTasks\Market;
use App\Models\RoutineTasks\MarketProduct;
use Illuminate\Http\Request;

class ManagerShoppingListProductController extends Controller
{   
    public function __invoke(Request $request, $shoppingListId)
    {
        $data = [];
        $data['shoppingListId'] = $shoppingListId;

        $data['productsCategory'] = $this->groupProductByCategory();

        $data['markets'] = Market::all();

        $data['productsList'] = MarketProduct::where('shopping_list_id', $shoppingListId)
            ->pluck('product_id')
            ->toArray();

        $data['marketsList'] = MarketProduct::where('shopping_list_id', $shoppingListId)
            ->pluck('market_id')
            ->toArray();

        return view('routine-tasks.manager-shopping-list.list-product', $data);
    }

    private function groupProductByCategory()
    {
        $categoryProducts = [];

        $categories = Category::join('products', 'products.category_id', '=', 'categories.id')
            ->select(
                'categories.id AS categoryId',
                'categories.description',
                'products.id AS productId',
                'products.item'
            )            
            ->get('categories.description', 'categories.id');

        return $categories->groupBy('description');
    }
}
