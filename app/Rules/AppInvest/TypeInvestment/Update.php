<?php

namespace Rules\AppInvest\TypeInvestment;

use App\Models\AppInvest\TypeInvestment;

class Update
{
    public function execute($data, $id)
    {
        $typeInvestment = TypeInvestment::where('id', $id)
            ->first();

        if ($typeInvestment) {
            $data['acronym'] = strtoupper($data['acronym']);
            $typeInvestment->update($data);
        }

        $response = [
            'status' => ($typeInvestment) ? 'success' : 'danger' ,
            'msg' => ($typeInvestment) ? 'Atualizado' : 'Ocorreu um erro.'
        ];
                
        return $response;
    }
}