<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'address',
        'user_id',
        'mobile_number_verified_at',
        'is_mobile_customer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
