<?php

namespace Rules\ControlFinance\Helpers;

class Money
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
}