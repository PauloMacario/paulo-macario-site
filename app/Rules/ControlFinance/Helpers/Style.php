<?php

namespace Rules\ControlFinance\Helpers;

use Illuminate\Support\Carbon;
use App\Models\ControlFinance\PaymentType;

class Style
{
    public static function getPaymentTypeColor($id)
    {
        $PaymentType = PaymentType::where('id', $id)->first();

        dd($PaymentType);
    }
}