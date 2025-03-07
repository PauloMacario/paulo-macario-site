<?php

namespace Rules\AppInvest\TypeInvestment;

use App\Models\AppInvest\TypeInvestment;

class Show
{
    public function get($id)
    {
        return TypeInvestment::find($id);          
    }
}