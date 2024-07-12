<?php

namespace App\Http\Controllers\ControlFinance\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewShopperController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('control-finance.shopper.new');
    }
}
