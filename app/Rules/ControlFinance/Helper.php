<?php

namespace Rules\ControlFinance;

use Illuminate\Support\Carbon;

class Helper
{
    public static function convertValue($value)
    {
        if (str_contains($value, ',')) {
            return str_replace(
                ',',
                '.',
                str_replace(
                    '.',
                    '', 
                    $value
                )
            );
        }

        return $value;        
    }

    public static function convertDate($date)
    {
        return Carbon::createFromFormat("d/m/Y", $date)
            ->toDateString();
    }
}