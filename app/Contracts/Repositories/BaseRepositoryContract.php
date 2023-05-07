<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryContract
{
    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;

    /**
     * @param int $id
     * @return Model|null
     */
    public function findOrFail(int $id): ?Model;

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage): mixed;


    /**
     * @return Collection
     */
    public function all(): Collection;
}
