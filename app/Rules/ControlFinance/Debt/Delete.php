<?php

namespace Rules\ControlFinance\Debt;

use App\Models\ControlFinance\Debt;
use App\Models\ControlFinance\Installment;

class Delete
{
    public function execute($id)
    {   
        $debt = Debt::find($id);

        if (!$debt) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        if ($debt->installments->cont() > 0) {
            foreach ($debt->installments as $installment) {
                $installment->delete();
            }
        }
        
        $debt->delete();

        return ["status" => "success" , "msg" => "Excluído.", "statusCode" => 200];
    } 
}