<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'id',
        'name',
        'address',
        'telephone',
        'email',
        'contact_person_name',
        'contact_person_telephone',
        'contact_person_email',
    ];
}
