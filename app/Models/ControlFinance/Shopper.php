<?php

namespace App\Models\ControlFinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Shopper extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'color',
        'img',
        'status',
        'user_id'
    ];

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
