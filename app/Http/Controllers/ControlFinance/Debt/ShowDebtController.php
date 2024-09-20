<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Debt;
use Illuminate\Http\Request;

class ShowDebtController extends Controller
{
    public function __invoke($id)
    {
        $data = [];

        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = auth()->user()->shoppers;
        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['debt'] = Debt::find($id);

        return view('control-finance.debt.detail', $data);
    }
}
