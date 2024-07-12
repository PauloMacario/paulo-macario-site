<?php

namespace Rules\ControlFinance\Shopper;

use App\Models\ControlFinance\Shopper;

class Create
{
    public function execute($request)
    {
        $newShopper = Shopper::create($request->except('_token'));

        if (!$newShopper) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Adicionado(a) com sucesso!", "statusCode" => 200];
    }
}