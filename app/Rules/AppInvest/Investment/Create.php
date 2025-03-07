<?php

namespace Rules\AppInvest\Investment;

use App\Models\AppInvest\Investment;

class Create
{
    public function execute($data)
    {       
        $investment = Investment::create($data);
        
        $response = [
            'status' => ($investment) ? 'success' : 'danger' ,
            'msg' => ($investment) ? 'Criado' : 'Ocorreu um erro.'
        ];
        
        return $response;
    }
}