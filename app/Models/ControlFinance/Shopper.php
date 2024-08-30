<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Shopper extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'color',
        'status'
    ];

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
