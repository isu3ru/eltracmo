<?php

namespace App\Repositories\Contracts;

use App\Models\Appointment;

interface AppointmentRepositoryInterface extends CRUDRepositoryInterface
{
    /**
     * Find the appointment by the plate number
     * @param string $registrationNumber
     * @return Appointment
     */
    public function findByRegistrationNumber(string $registrationNumber): Appointment;
}
