<?php

use Illuminate\Support\Carbon;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Fluent;
use Illuminate\Support\Str;
use Rules\ControlFinance\Helpers\PaymentTypeById;
use Rules\ControlFinance\Helpers\DebtById;

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
        if (! $date) {
            return '00/00/0000';
        }

        return Carbon::parse($date)->format('d/m/Y');
    }
}

if ( ! function_exists('formatDateYearMonthBR')) {
    function formatDateYearMonthBR($date)
    {
        if (! $date) {
            return '00/00/0000';
        }

        return Carbon::parse($date)->format('m/Y');
    }
}

if ( ! function_exists('getDay')) {
    function getDay(string $date)
    {
        return Str::substr($date, 8, 2);
    }
}

if ( ! function_exists('textTruncate')) {
    function textTruncate(string $text, int $qtd)
    {
        return Str::limit($text, $qtd);
    }
}

if ( ! function_exists('getNamePaymentType')) {
    function getNamePaymentType(int $id)
    {
        return PaymentTypeById::getDescription($id);
    }
}

if ( ! function_exists('getNameDebt')) {
    function getNameDebt(int $id)
    {
        return DebtById::getLocality($id);
    }
}

