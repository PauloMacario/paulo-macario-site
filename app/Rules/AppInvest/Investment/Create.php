<?php

namespace Rules\AppInvest\Investment;

use App\Models\AppInvest\Investment;

class Create
{    
    public function execute($data)
    {
        $newInvestment = Investment::create($data);

        return $newInvestment;
    }
}