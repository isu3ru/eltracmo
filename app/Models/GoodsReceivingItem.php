<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsReceivingItem extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'supplier_id',
        'item_id',
        'quantity',
        'free_issue_quantity',
        'unit_cost',
        'total_cost',
    ];

    protected $casts = [
        'quantity' => 'double',
        'free_issue_quantity' => 'double',
        'unit_cost' => 'double',
        'total_cost' => 'double',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
