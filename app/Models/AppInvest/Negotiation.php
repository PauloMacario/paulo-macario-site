<?php

namespace App\Models\AppInvest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negotiation extends AppInvestModel
{
    use HasFactory;

    protected $fillable = [
        'investment_id',
        'date',
        'type_negotiation', 
        'quantity',
        'value'
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
