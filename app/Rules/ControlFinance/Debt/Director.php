<?php

namespace Rules\ControlFinance\Debt;

use Illuminate\Support\Arr;

class Director
{
    public $debtBuilder;

    public function setBuilder(DebtBuilder $debtBuilder)
    {
        $this->debtBuilder = $debtBuilder;
    }

    public function buildDebt($dataDebt)
    {
        $this->debtBuilder->buildDebt($dataDebt);
        $this->debtBuilder->buildInstalments();

        if (Arr::exists($dataDebt, 'checkrateio')) {
            $this->debtBuilder->buildPartitions();
        }

        return $this->debtBuilder->getDebt();
    }
}