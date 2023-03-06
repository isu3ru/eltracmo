<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function unitOfMeasure(): BelongsTo
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }

    public function calculationUnit(): BelongsTo
    {
        return $this->belongsTo(CalculationUnit::class);
    }

    public function jobItems(): HasMany
    {
        return $this->hasMany(JobItem::class);
    }
}
