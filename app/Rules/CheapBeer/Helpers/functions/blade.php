<?php

use Illuminate\Support\Carbon;

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