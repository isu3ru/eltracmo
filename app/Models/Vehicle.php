<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'id',
        'customer_id',
        'make',
        'model',
        'registered_year',
        'registration_number',
        'color',
        'remarks',
    ];
}
