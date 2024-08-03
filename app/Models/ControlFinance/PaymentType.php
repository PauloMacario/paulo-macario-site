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
        'status',
        'previous_processing',
        'next_processing',
        'next_payment'
    ];

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}
