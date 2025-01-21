<?php

namespace Rules\ControlFinance\Payment;

use Rules\ControlFinance\Installment\InstallmentsByFilters;
use Rules\ControlFinance\Helpers\SearchFilters;
use App\Models\ControlFinance\Installment;

class GetInstallmetsByFilters
{
    protected $filters;

    protected $installments;

    public function __construct($fiters)
    {
        $this->filters = (object)$fiters;
    }


    public function execute()
    {
       $this->installments = (new InstallmentsByFilters($this->filters))->search(); 
       
       return $this->paymentTypeParse();
    }

    private function paymentTypeParse()
    {
        $data = [];

        foreach ($this->installments as $installment) {

            $paymentType = $installment->debt->paymentType;

            if (! array_key_exists($paymentType->id, $data)) {
                $data[$paymentType->id]['id'] = $paymentType->id;
                $data[$paymentType->id]['description'] = $paymentType->description;
                $data[$paymentType->id]['color'] = $paymentType->color;
                $data[$paymentType->id]['data'][] = $installment;

                continue;
            }

            if (array_key_exists($paymentType->id, $data)) {
                $data[$paymentType->id]['data'][] = $installment;

                continue;
            }           
        }

        $data = $this->getTotalValue($data);
        
        sort($data);
        
        return $data;
    }

    public function getTotalValue($data)
    {
        foreach ($data as $key => $tipos) {
           
            $data[$key]['totalValue'] = 0;
            
            foreach ($tipos['data'] as $item) {
                $data[$key]['totalValue'] += $item->value;                
            }           
        }

        return $data;
    }
}