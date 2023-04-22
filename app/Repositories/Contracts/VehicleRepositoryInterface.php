<?php

namespace App\Repositories\Contracts;

use App\Models\Vehicle;

interface VehicleRepositoryInterface extends CRUDRepositoryInterface
{
    /**
     * Find the vehicle by the plate number
     * @param string $registrationNumber
     * @return Vehicle
     */
    public function findByRegistrtaionNumber(string $registrationNumber): Vehicle;
}
