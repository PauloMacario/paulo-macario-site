<?php

namespace Rules\ControlFinance\Helpers;

use App\Models\ControlFinance\PaymentType;

class PaymentTypeById
{
    public static function get($id)
    {
        return PaymentType::find($id);
    }

    public static function getDescription($id)
    {
        $paymentType = PaymentType::find($id);

        return $paymentType->description;

    }
}