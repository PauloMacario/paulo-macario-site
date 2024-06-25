<?php

namespace Rules\ControlFinance\PaymentType;

use App\Models\ControlFinance\PaymentType;

class Create
{
    public function execute($request)
    {
        $newPaymentType = PaymentType::create($request->except('_token'));

        if (!$newPaymentType) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Nova forma de pagamento criada.", "statusCode" => 200];
    }
}