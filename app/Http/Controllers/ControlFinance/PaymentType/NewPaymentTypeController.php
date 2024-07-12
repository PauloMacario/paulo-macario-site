<?php

namespace App\Http\Controllers\ControlFinance\PaymentType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewPaymentTypeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('control-finance.payment-type.new');
    }
}
