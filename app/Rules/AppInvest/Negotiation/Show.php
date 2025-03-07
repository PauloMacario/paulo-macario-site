<?php

namespace Rules\AppInvest\Negotiation;

use Rules\AppInvest\Negotiation\ShowAll;

class Show
{
    public function get($id)
    {
        return TypeInvestment::find($id);          
    }
}