<?php

namespace App\Repositories\Contracts;

use App\Models\Customer;

interface CustomerRepositoryInterface extends CRUDRepositoryInterface
{
    /**
     * Find the customer by user id
     * @param string $userId
     * @return Customer|null
     */
    public function findByUser(string $userId): ?Customer;
}
