<?php

namespace Rules\AppInvest\Segment;

use App\Models\AppInvest\Segment;

class Create
{
    public function execute($data)
    {
        $segment = Segment::create($data);
        
        $response = [
            'status' => ($segment) ? 'success' : 'danger' ,
            'msg' => ($segment) ? 'Criado' : 'Ocorreu um erro.'
        ];
        
        return $response;
    }
}