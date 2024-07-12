<?php

namespace Rules\ControlFinance\Shopper;

use App\Models\ControlFinance\Shopper;

class Update
{
    public function execute($request)
    {
        $shopper = Shopper::find($request->id);

        if (!$shopper) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        $shopper->update(
            $request->except(['id','_token'])
        );

        return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];
    }
}