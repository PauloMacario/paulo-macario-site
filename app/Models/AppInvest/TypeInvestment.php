<?php

namespace App\Models\AppInvest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInvestment extends AppInvestModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym',
        'color',
        'order'
    ];

    public function segments()
    {
        return $this->hasMany(Segment::class);
    }
}
