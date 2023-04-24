<?php

namespace App\Enums;

enum JobStatus: String
{
    case PENDING = 'pending';
    case ONGOING = 'ongoing';
    case COMPLETED = 'completed';
    case ONHOLD = 'onhold';
}
