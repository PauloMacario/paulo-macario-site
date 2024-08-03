<?php

namespace App\Http\Controllers\ControlFinance\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentRecurseListController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('control-finance.payment.recurse-list');
    }
}
