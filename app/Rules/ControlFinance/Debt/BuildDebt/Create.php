<?php

namespace Rules\ControlFinance\Debt\BuildDebt;

use App\Models\ControlFinance\Debt;
use App\Models\ControlFinance\Installment;

class Create
{
    public function execute($dataDebt)
    {
        $director = new Director();
        $debtBuilder = new ConcreteBuilder();

        $director->setBuilder($debtBuilder);
        $buildDebt = $director->buildDebt($dataDebt);
        
        $parts = $buildDebt->listParts();
       
        $debt = Debt::create($parts['debt']);

        $this->createInstallments($parts, $debt->id);

        return $debt;
    }

    public function createInstallments($parts, $debtId)
    {
        foreach ($parts['installments'] as $key => $intallment) {
            $intallment['debt_id'] = $debtId;
            
            $inst = Installment::create($intallment);
        }
    }
}