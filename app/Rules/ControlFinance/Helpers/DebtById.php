<?php

namespace Rules\ControlFinance\Helpers;

use App\Models\ControlFinance\Debt;

class DebtById
{
    public static function get($id)
    {
        return Debt::find($id);
    }

    public static function getLocality($id)
    {
        $debt = Debt::find($id);

        return $debt->locality;

    }
}