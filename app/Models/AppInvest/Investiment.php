<?php

namespace App\Models\AppInvest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investiment extends Model
{
    use HasFactory;

    protected $connection = 'mysql_app_invest';
}
