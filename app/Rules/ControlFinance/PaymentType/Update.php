<?php

namespace Rules\ControlFinance\PaymentType;

use App\Models\ControlFinance\PaymentType;

class Update
{
    public function execute($request)
    {
        $PaymentType = PaymentType::find($request->id);

        if (!$PaymentType) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        $PaymentType->update(
            $request->except(['id','_token'])
        );

        return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];
    }
}