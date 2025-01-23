<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public const STATUS_ENABLED = 'E';

    public const STATUS_DISABLED = 'D';

    protected $fillable = [
        'description',
        'order',
        'color',
        'status',
        'user_id'
    ];
   
    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}
