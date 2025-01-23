<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    public const STATUS_ENABLED = 'E';

    public const STATUS_DISABLED = 'D';

    protected $fillable = [
        'description',
        'order',
        'processing_day',
        'payment_day',
        'installment_enable',
        'color',
        'status',
        'previous_processing',
        'next_processing',
        'next_payment',
        'user_id'
    ];

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}
