<?php

use Illuminate\Support\Carbon;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Fluent;

/* if ( ! function_exists('xxxxxx')) {
    function xxxxxx()
    {

    }
} */

if ( ! function_exists('formatMoneyBR')) {
    function formatMoneyBR($money)
    {
        if ( ! is_numeric($money)) {
            return "##";
        }
    
        return number_format($money,2,',','.');
    }
}

if ( ! function_exists('formatDateBR')) {
    function formatDateBR($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}

if ( ! function_exists('getStyle')) {
    function getStyle($style, $key)
    {
        $style = json_decode($style, true);

        $fluent = new Fluent($style);

        return $fluent->$key;

    }
}