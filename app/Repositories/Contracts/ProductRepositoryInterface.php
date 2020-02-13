<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
use Illuminate\Support\Collection;
use App\Models\User;

interface ProductRepositoryInterface
{

    /**
     * @return array
     */
    public function options(): array;

    /**
     * @param array $data
     * @return Product
     */
    public function create(array $data, User $current_user): Product;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @param array $data
     * @param int $id
     * @return Product
     */
    public function update($id, array $data): Product;

    /**
     * @param array $params
     * @return Collection|null
     */
    public function get(array $params, array $with = []): ?Collection;

    /**
     * @param array $params
     * @return Product|null
     */
    public function getById(int $id, array $with = []): ?Product;
}