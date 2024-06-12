<?php

namespace Rules\ControlFinance\Installment;

use App\Models\ControlFinance\Debt;
use App\Models\ControlFinance\Installment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UpdateInstallment
{
    public function execute($data)
    {
        $installment = Installment::find($data['id']);

        if ($installment) {
            
            $installment->update([
                    "due_date" => $data['due_date'],
                    "number_installment" => $data['number_installment'],
                    "shopper_id" => $data['shopper_id'],
                    "value" => $this->convertMoney($data['value'])
                ]
            );
            
            $this->updateDebtLocality($data['debt_id'], $data['locality']);

            return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];
        }

        return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
    }

    public function convertMoney($value)
    {
        $clenValue = Str::of($value)->remove('.');

        $valueConvert = Str::replaceFirst(',', '.', $clenValue);

        return $valueConvert;
    }

    public function updateDebtLocality($debtId, $locality)
    {
        $debt = Debt::find($debtId);

        if ($debt) {
            $debt->update([
                    "locality" => $locality
                ]
            );
        }
    }
}