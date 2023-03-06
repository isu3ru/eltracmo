<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalculationUnit extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    protected $fillable = ['id', 'name'];
}
