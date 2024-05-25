<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    public function debt()
    {
        return $this->belongsTo(Debt::class);
    }
}
