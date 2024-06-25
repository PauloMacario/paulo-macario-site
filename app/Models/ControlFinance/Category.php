<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'style',
        'status'
    ];

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}
