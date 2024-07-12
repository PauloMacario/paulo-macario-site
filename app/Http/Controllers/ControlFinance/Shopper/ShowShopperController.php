<?php

namespace App\Http\Controllers\ControlFinance\Shopper;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Shopper;
use Illuminate\Http\Request;

class ShowShopperController extends Controller
{
    public function __invoke($id)
    {
        $data['shopper'] = Shopper::find($id);
        
        return view('control-finance.shopper.detail', $data);
    }
}
