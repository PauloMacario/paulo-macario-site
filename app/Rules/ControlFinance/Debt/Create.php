<?php

namespace Rules\ControlFinance\Debt;

use App\Models\ControlFinance\PaymentType;
use Rules\ControlFinance\Helpers\Money;

class Create
{
    public function execute($dataDebt)
    {
        $paymentType = PaymentType::find($dataDebt['payment_type_id']);
      
        $dataDebt['total_value'] = Money::convertValue($dataDebt['total_value']);

        if (! $paymentType->previous_processing) {
            $createInCash = new CreateInCash($dataDebt);

            return $createInCash->execute($dataDebt);
        }

        if ($dataDebt['date'] >= $paymentType->previous_processing && $dataDebt['date'] < $paymentType->next_processing) {            
            $createInCurrentMonth = new CreateWithInstallmentsInCurrentMonth($dataDebt);

            return $createInCurrentMonth->execute($dataDebt);
        }
       
        $createInCurrentMonth = new CreateWithInstallmentsOtherMonth($dataDebt);

        return $createInCurrentMonth->execute();;       
    }
}