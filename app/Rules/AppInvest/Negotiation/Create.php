<?php

namespace Rules\AppInvest\Negotiation;

use App\Models\AppInvest\Negotiation;
use Rules\AppInvest\Helpers\Money;

class Create
{
    public function execute($data)
    {
        $data['value'] = Money::convertValue($data['value']);

        $negotiation = Negotiation::create($data);
        
        $rosponse = [
            'status' => ($negotiation) ? 'success' : 'danger' ,
            'msg' => ($negotiation) ? 'Criado' : 'Ocorreu um erro.'
        ];
        
        return $rosponse;
    }
}