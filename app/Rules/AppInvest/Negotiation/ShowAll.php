<?php

namespace Rules\AppInvest\Negotiation;

use App\Models\AppInvest\Negotiation;

class ShowAll
{
    public function get()
    {
        $data['negotiations'] =  Negotiation::all();  

        $value = $this->getTotalValue($data['negotiations']);

        $data['total'] = $value['total'];

        $data['calculation'] = $value['calculation'];

        return $data;
    }

    private function getTotalValue($negotiations)
    {
        $total = 0;
        $calculation = '';

        foreach ($negotiations as $negotiation) {
            $calculation .= (string)$negotiation->value .'#';
            $total += $negotiation->value;
        }

        $calculation .= '#' . (string)$total;

        $totalValue['total'] = $total; 
        $totalValue['calculation'] = explode('#', $calculation); 

        return $totalValue;
    }
}