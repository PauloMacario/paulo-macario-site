<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function shopper()
    {
        return $this->belongsTo(Shopper::class);
    }
}
