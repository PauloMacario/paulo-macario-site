<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Illuminate\Http\Request;

class NewDebtController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = Shopper::all();
        
        return view('control-finance.debt.new', $data);
    }
}
