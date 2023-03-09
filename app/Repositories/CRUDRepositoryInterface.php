<?php

namespace App\Repositories;

interface CRUDRepositoryInterface
{
    /**
     * Create new resource with the data
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Find the resource by id
     * @param string $id
     * @return mixed
     */
    public function find(string $id);

    /**
     * Update the resource identified by the id
     * @param string $id
     * @param array $data
     * @return mixed
     */
    public function update(string $id, array $data);

    /**
     * Delete the resource identified by the id
     * @param string $id
     * @return mixed
     */
    public function delete(string $id);

    /**
     * Query the list of resources
     * @return mixed
     */
    public function list();
}
