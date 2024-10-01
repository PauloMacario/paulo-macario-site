<?php

namespace App\Http\Controllers\RoutineTasks\MarketProduct;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\MarketProduct;
use Illuminate\Http\Request;

class UpdateMarketProductsController extends Controller
{  
    public function __invoke(Request $request)
    {          
        if (!isset($request->market)) {
            MarketProduct::where('id' , '>', 0)
                ->delete();

            $request->session()->flash('success', 'Atualizado com sucesso!');
            return redirect()->back();
        }

        foreach ($request->market as $marketId => $products) {

            MarketProduct::where('market_id' , $marketId)
                ->whereNotIn('product_id', $products)
                ->delete();

            foreach ($products as $product => $on) {
                
                $exists = MarketProduct::where('market_id' , $marketId)
                    ->where('product_id', $product)
                    ->first();
                
                if (! $exists) {
                    MarketProduct::create([
                        'market_id' => $marketId,
                        'product_id' =>  $product
                    ]);
                }
            }
        }

        $request->session()->flash('success', 'Atualizado com sucesso!');
        return redirect()->back();
    }
}
