<?php

namespace Rules\AppInvest\Helpers;

use Illuminate\Support\Carbon;

class Date
{
    public static function convertDate($date)
    {
        return Carbon::createFromFormat("d/m/Y", $date)
            ->toDateString();
    }
}