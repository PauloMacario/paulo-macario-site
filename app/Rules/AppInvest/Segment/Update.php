<?php

namespace Rules\AppInvest\Segment;

use App\Models\AppInvest\Segment;

class Update
{
    public function execute($data, $id)
    {
        $segment = Segment::where('id', $id)
            ->first();

        if ($segment) {
          
            $segment->update($data);
        }

        $response = [
            'status' => ($segment) ? 'success' : 'danger' ,
            'msg' => ($segment) ? 'Atualizado' : 'Ocorreu um erro.'
        ];
                
        return $response;
    }
}