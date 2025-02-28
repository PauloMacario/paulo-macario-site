<?php

namespace Rules\ControlFinance\Installment;

use App\Models\ControlFinance\Debt;
use App\Models\ControlFinance\Installment;
use Rules\ControlFinance\Helpers\Money;

class Update
{
    public function execute($data)
    {
        $installment = Installment::find($data['id']);

        if (!$installment) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

       $installment->update([
                "due_date" => $data['due_date'],
                "number_installment" => $data['number_installment'],
                "shopper_id" => $data['shopper_id'],
                "value" => Money::convertValue($data['value']),
                "status" =>  $data['status'],
                "created_at" =>  $data['created_at'],
                "order" =>  $data['order']
            ]
        );
            
        $this->updateDebt($data);

        return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];        
    }

    public function updateDebt($data)
    {
        $debt = Debt::find($data['debt_id']);

        if (!$debt) {
            return;
        }

        $debt->update([
            "locality" => $data['locality'],
            "locality_obs" => $data['locality_obs'],
            "trade_name" => $data['trade_name'],
            ]
        );
    }
}