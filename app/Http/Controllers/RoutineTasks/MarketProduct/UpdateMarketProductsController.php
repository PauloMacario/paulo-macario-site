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

        $marketOn = [];
        $marketOff = [];

        foreach ($request->marketAll as $allId => $all) {
           
            foreach ($all as $id => $on) {      
                if (array_key_exists($id, $request->market[$allId])) {
                    $marketOn[$allId][] = $id;
                }
                else{
                    $marketOff[$allId][] = $id;
                }
            }
        }

        foreach ($marketOff as $marketId => $productsOff) {

            MarketProduct::where('market_id' , $marketId)
                ->whereIn('product_id', $productsOff)
                ->delete();           
        }


        foreach ($marketOn as $marketId => $productsOn) {

            foreach ($productsOn as $productId) {
                $exist = MarketProduct::where('market_id' , $marketId)
                    ->where('product_id', $productId)
                    ->first();
                if (! $exist) {
                    MarketProduct::create([
                        'market_id' => $marketId,
                        'product_id' =>  $productId
                    ]);
                }
            }
        }

        $request->session()->flash('success', 'Atualizado com sucesso!');
        return redirect()->back();
    }
}
