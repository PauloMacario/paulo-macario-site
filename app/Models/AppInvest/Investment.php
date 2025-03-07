<?php

namespace App\Models\AppInvest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends AppInvestModel
{
    use HasFactory;

    protected $fillable = [
        'segment_id',
        'name',
        'color',
        'order'
    ];

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function negotiations()
    {
        return $this->hasMany(Negotiation::class);
    }
}
