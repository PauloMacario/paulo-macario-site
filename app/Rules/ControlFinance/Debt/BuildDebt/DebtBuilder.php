<?php

namespace Rules\ControlFinance\Debt\BuildDebt;

interface DebtBuilder
{
    public function buildDebt($data);

    public function buildInstalments();
}