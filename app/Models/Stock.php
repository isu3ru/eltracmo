<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'sku',
        'item_id',
        'quantity',
        'free_issue_quantity',
        'unit_stock_price',
        'lot_stock_price',
        'batch_number',
        'unit_sale_price',
        'unit_discount_rate',
        'goods_receiving_item_id',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function goodsReceivingItem(): BelongsTo
    {
        return $this->belongsTo(GoodsReceivingItem::class);
    }

    public function jobItems(): HasMany
    {
        return $this->hasMany(JobItem::class);
    }
}
