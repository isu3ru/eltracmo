<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'address',
        'user_id',
        'is_mobile_customer',
        'photo',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the customer's full name.
     */
    public function fullName(): string
    {
        // return first and last names, if last name is not set, send only the first name
        return $this->last_name ? "{$this->first_name} {$this->last_name}" : $this->first_name;
    }

    protected $casts = [
        'mobile_number_verified_at' => 'datetime',
    ];
}
