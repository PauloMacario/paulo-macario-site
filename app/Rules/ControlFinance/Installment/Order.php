<?php

namespace Rules\ControlFinance\Installment;

use App\Models\ControlFinance\Installment;

class Order
{
    protected $installments;

    public function __construct($installments)
    {   
        $this->installments = $installments;
    }

    public function execute()
    {  
        foreach ($this->installments as $id => $valor) {
          
            Installment::where('id', $id)
                ->update([
                    "order" => $valor,
                ]);
        }

        return true;
    }
}