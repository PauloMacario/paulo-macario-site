<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewDebtController extends Controller
{
    public function __invoke(Request $request)
    {
        $userId = auth()->user()->id;

        $data = [];
        $data['categories'] = Category::where('user_id', $userId)
            ->where('status', Category::STATUS_ENABLED)
            ->orderBy('order', 'asc')
            ->get();

        $data['paymentTypes'] = PaymentType::where('user_id', $userId)
            ->where('status', PaymentType::STATUS_ENABLED)
            ->orderBy('order', 'asc')
            ->get();

        $data['shoppers'] = auth()
            ->user()
            ->shoppers;
        
        $data['dateNow'] = now()->format('Y-m-d');

        return view('control-finance.debt.new', $data);
    }
}
