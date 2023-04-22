<?php

namespace App\Repositories;

use App\Models\Vehicle;
use App\Repositories\Contracts\VehicleRepositoryInterface;

class VehicleRepository implements VehicleRepositoryInterface
{
    public function create(array $data)
    {
        return Vehicle::create($data);
    }

    public function find(string $id)
    {
        return Vehicle::find($id);
    }

    public function update(string $id, array $data)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->update($data);

        return $vehicle;
    }

    public function delete(string $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return $vehicle;
    }

    public function list()
    {
        return Vehicle::all();
    }

    public function findByRegistrtaionNumber(string $registrationNumber): Vehicle
    {
        return Vehicle::where('registration_number', $registrationNumber)->first();
    }
}
