<?php

namespace Rules\AppInvest\Negotiation;

use App\Models\AppInvest\Negotiation;
use Rules\AppInvest\Helpers\Money;

class Update
{
    public function execute($data, $id)
    {
        $typeInvestment = Negotiation::where('id', $id)
            ->first();

        if ($typeInvestment) {
            $data['value'] = Money::convertValue($data['value']);
            $typeInvestment->update($data);
        }

        $response = [
            'status' => ($typeInvestment) ? 'success' : 'danger' ,
            'msg' => ($typeInvestment) ? 'Atualizado' : 'Ocorreu um erro.'
        ];
                
        return $response;
    }
}