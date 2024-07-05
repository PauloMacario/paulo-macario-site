<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'order',
        'processing_day',
        'payment_day',
        'installment_enable',
        'style',
        'status'
    ];

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}
