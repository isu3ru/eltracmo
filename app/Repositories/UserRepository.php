<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements Contracts\UserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(array $data)
    {
        return User::create($data);
    }

    /**
     * @inheritDoc
     */
    public function find(string $id)
    {
        return User::whereId($id)->first();
    }

    /**
     * @inheritDoc
     */
    public function update(string $id, array $data)
    {
        $user = $this->find($id);
        if (!$user) {
            return null;
        }
        return $user->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $id)
    {
        $user = $this->find($id);
        if (!$user) {
            return null;
        }
        return $user->delete();
    }

    /**
     * @inheritDoc
     */
    public function list()
    {
        return User::all();
    }
}
