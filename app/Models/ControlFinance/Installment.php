<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = [
        'debt_id',
        'number_installment',
        'due_date',
        'value',
        'status'
    ];

    public function debt()
    {
        return $this->belongsTo(Debt::class);
    }

    public function partitions()
    {
        return $this->hasMany(Partition::class);
    }
}
