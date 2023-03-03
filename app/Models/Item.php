<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Item extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'id',
        'name',
        'make',
        'model',
        'color',
        'weight (g)',
        'height (cm)',
        'length (cm)',
        'unit_of_measure_id ',
        'calculation_unit_id',
        'unit_price',
        'reorder_qty',
    ];
}
