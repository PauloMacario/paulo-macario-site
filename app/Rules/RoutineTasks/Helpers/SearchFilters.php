<?php

namespace Rules\RoutineTasks\Helpers;

use App\Models\ControlFinance\{
    Category,
    PaymentType,
    Shopper
};

use Illuminate\Support\Carbon;


class SearchFilters
{
    public const MODELS = [
        "categories" => Category::class,
        "paymentTypes" => PaymentType::class,
        "shoppers" => Shopper::class
    ];

    public static function get()
    {
        $filters = [];

        foreach (self::MODELS as $key => $class) {

            $model = app()->make($class);
            
            if ($key == 'shoppers') {

                $shoppersIds = auth()->user()->shoppers;

                $filters[$key] = $shoppersIds = auth()->user()->shoppers;

                continue;            
            }

            $data = $model->where('id', '>', 0)
                ->orderBy('order', 'asc')
                ->get();
            
            $filters[$key] = $data;
        }

        return $filters;
    }
}