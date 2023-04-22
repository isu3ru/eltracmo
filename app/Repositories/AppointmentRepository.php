<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Repositories\Contracts\AppointmentRepositoryInterface;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function create(array $data)
    {
        return Appointment::create($data);
    }

    public function find(string $id)
    {
        return Appointment::find($id);
    }

    public function update(string $id, array $data)
    {
        $appointment = Appointment::find($id);
        $appointment->update($data);

        return $appointment;
    }

    public function delete(string $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return $appointment;
    }

    public function list()
    {
        return Appointment::all();
    }

    public function findByRegistrationNumber(string $registrationNumber): Appointment
    {
        return Appointment::where('registration_number', $registrationNumber)->first();
    }
}
