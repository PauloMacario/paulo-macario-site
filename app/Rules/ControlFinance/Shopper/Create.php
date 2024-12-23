<?php

namespace Rules\ControlFinance\Shopper;

use App\Models\ControlFinance\Shopper;
use Illuminate\Support\Facades\Auth;

class Create
{
    public function execute($request)
    {
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'E'; 
     
        $newShopper = Shopper::create($data);

        if (!$newShopper) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Adicionado(a) com sucesso!", "statusCode" => 200];
    }
}