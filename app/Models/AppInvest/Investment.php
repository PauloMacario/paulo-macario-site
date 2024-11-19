<?php

namespace App\Models\AppInvest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends AppInvestModel
{
    use HasFactory;

    protected $fillable = [
        'type_investment_id',
        'name',
        'color'
    ];

    public function typeInvestment()
    {
        return $this->belongsTo(TypeInvestment::class);
    }

    public function negotiations()
    {
        return $this->hasMany(Negotiation::class);
    }
}
