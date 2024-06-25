<?php

namespace Rules\ControlFinance\Installment;

use App\Models\ControlFinance\Installment;

class Delete
{
    public function execute($id)
    {   
        $installment = Installment::find($id);

        if (!$installment) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }
        
        $installment->delete();

        return ["status" => "success" , "msg" => "Excluído.", "statusCode" => 200];
    } 
}