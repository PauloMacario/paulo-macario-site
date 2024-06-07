<?php

namespace Rules\ControlFinance\Debt;

interface DebtBuilder
{
    public function buildDebt($data);

    public function buildInstalments();
}