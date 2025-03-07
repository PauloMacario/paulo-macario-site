<?php

namespace Rules\AppInvest\TypeInvestment;

use App\Models\AppInvest\TypeInvestment;

class Create
{
    public function execute($data)
    {
        $data['acronym'] = strtoupper($data['acronym']);

        $typeInvestment = TypeInvestment::create($data);
        
        $response = [
            'status' => ($typeInvestment) ? 'success' : 'danger' ,
            'msg' => ($typeInvestment) ? 'Criado' : 'Ocorreu um erro.'
        ];
        
        return $response;
    }
}