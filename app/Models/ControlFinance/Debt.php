<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_type_id',
        'category_id',
        'shopper_id',
        'date',
        'locality',
        'locality_obs',
        'trade_name',
        'total_value',
        'number_installments',
        'prorated_debt',
        'status'
    ];

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

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
