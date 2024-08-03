<?php

namespace Rules\ControlFinance\Installment;

use App\Models\ControlFinance\Installment;

class Create
{
    protected $installments;

    public function __construct($installments)
    {   
        $this->installments = $installments;
    }

    public function execute()
    {   
        foreach ($this->installments as $data) {
            Installment::create($data);
        }

        return true;
    }
}