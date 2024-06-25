<?php

namespace Rules\ControlFinance\Debt\BuildDebt;

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

        return $this->debtBuilder->getDebt();
    }
}