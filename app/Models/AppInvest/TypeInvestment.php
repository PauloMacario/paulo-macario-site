<?php

namespace App\Models\AppInvest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'acronym',
        'color',
        'order'
    ];

    public function investiments()
    {
        return $this->hasMany(Investment::class);
    }
}