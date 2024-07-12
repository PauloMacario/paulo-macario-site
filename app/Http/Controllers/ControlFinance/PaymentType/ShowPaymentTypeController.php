<?php

namespace App\Http\Controllers\ControlFinance\PaymentType;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Http\Request;

class ShowPaymentTypeController extends Controller
{
    public function __invoke($id)
    {
        $data['paymentType'] = PaymentType::find($id);

        return view('control-finance.payment-type.detail', $data);
    }
}
