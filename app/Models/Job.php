<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'appointment_id',
        'type',
        'status',
        'remarks',
    ];

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function jobEmployees(): HasMany
    {
        return $this->hasMany(JobEmployee::class);
    }

    public function jobStatuses(): HasMany
    {
        return $this->hasMany(JobStatus::class);
    }

    public function jobTasks(): HasMany
    {
        return $this->hasMany(JobTask::class);
    }

    public function jobItems(): HasMany
    {
        return $this->hasMany(JobItem::class);
    }

    public function invoices(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
