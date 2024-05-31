<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partition extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopper_id',
        'installment_id',
        'value',
        'status'
    ];
}
