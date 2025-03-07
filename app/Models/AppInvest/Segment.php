<?php

namespace App\Models\AppInvest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends AppInvestModel
{
    use HasFactory;

    protected $fillable = [
        'type_investment_id',
        'name',
        'color',
        'order'
    ];

    public function typeInvestment()
    {
        return $this->belongsTo(TypeInvestment::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
