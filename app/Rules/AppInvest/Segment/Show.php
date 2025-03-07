<?php

namespace Rules\AppInvest\Segment;

use App\Models\AppInvest\Segment;

class Show
{
    public function get($id)
    {
        return Segment::find($id);          
    }
}