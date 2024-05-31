<?php

namespace Rules\ControlFinance\Debt;

/*
$debt = [
    "debt" => [
        "payment_type_id" => "",
        "category_id" => "",
        "shopper_id" => "",
        "date" => "",
        "locality" => "",
        "total_value" => "",
        "number_installments" => "",
        "status" => "E" 
    ],
    "installments" => [
        0 => [
            "debt_id" => 0,
            "number_installment" => "",
            "due_date" => "0000-00-00",
            "value" => "",
            "status" => "E"
        ]      
    ],
    "partitions" => [
        0 => [
            "shopper_id" => 0,
            "installment_id" => "",
            "value" => "",
            "status" => "E"
        ],
        1 => [
            "shopper_id" => 0,
            "installment_id" => "",
            "value" => "",
            "status" => "E"
        ]
    ]
];

*/ 


interface DebtBuilder
{
    public function buildDebt($data);

    public function buildInstalments();

    public function buildPartitions();
}