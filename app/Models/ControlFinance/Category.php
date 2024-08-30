<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'order',
        'style',
        'status'
    ];
   
    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}
