<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'vehicle_id',
        'appointment_date',
        'appointment_time',
        'confirmed_at',
        'cancelled_at',
        'cancellation_remarks',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    protected $casts = [
        'confirmed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function getAppointmentTimeAttribute()
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $this->attributes['appointment_time']);
    }
}
