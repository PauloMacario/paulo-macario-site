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
                "value" => Money::convertValue($data['value'])
            ]
        );
            
        $this->updateDebtLocality($data['debt_id'], $data['locality']);

        return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];        
    }

    public function updateDebtLocality($debtId, $locality)
    {
        $debt = Debt::find($debtId);

        if (!$debt) {
            return;
        }

        $debt->update([
            "locality" => $locality
            ]
        );
    }
}