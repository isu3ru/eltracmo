<?php

namespace App\Repositories;

use App\Models\Customer;
use COM;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CRUDRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(array $data)
    {
        return Customer::create($data);
    }

    /**
     * @inheritDoc
     */
    public function find(string $id)
    {
        return Customer::whereId($id)->first();
    }

    /**
     * @inheritDoc
     */
    public function update(string $id, array $data): ?bool
    {
        $customer = $this->find($id);
        if (!$customer) {
            return null;
        }
        return $customer->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $id): ?bool
    {
        $customer = $this->find($id);
        if (!$customer) {
            return null;
        }
        return $customer->delete();
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return Customer::all();
    }

    /**
     * @inheritDoc
     */
    public function findByUser(string $userId): ?Customer
    {
        return Customer::whereUserId($userId)->first();
    }
}
