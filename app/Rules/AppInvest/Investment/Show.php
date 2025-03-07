<?php

namespace Rules\AppInvest\Investment;

use App\Models\AppInvest\Investment;

class Show
{
    public function get($id)
    {
        return Investment::find($id);          
    }
}