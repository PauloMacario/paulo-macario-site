<?php

namespace Rules\ControlFinance\PaymentType;

use App\Models\ControlFinance\PaymentType;

class Update
{
    public function execute($request)
    {
        $paymentType = PaymentType::find($request->id);

        if (!$paymentType) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        $paymentType->update(
            $request->except(['id','_token'])
        );

        return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];
    }
}