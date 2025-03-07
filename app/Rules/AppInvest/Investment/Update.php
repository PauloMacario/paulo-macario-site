<?php

namespace Rules\AppInvest\Investment;

use App\Models\AppInvest\Investment;

class Update
{
    public function execute($data, $id)
    {
        $investment = Investment::where('id', $id)
            ->first();

        if ($investment) {
            $investment->update($data);
        }

        $response = [
            'status' => ($investment) ? 'success' : 'danger' ,
            'msg' => ($investment) ? 'Atualizado' : 'Ocorreu um erro.'
        ];
                
        return $response;
    }
}