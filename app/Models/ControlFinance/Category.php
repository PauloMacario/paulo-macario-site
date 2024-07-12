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
        'order',
        'style',
        'status'
    ];

    protected function style(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value),
            
        );
    }

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}
