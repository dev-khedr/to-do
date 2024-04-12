<?php

namespace App\Core\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function create(array $data): Model;

    public function list(array $filters, array $columns = ['*'], array $relations = [], array $conditions = [], array $orConditions = [], array $joins = []): Collection|LengthAwarePaginator;

    public function all(array $filters, array $columns = ['*'], array $relations = [], array $conditions = [], array $orConditions = [], array $joins = []): Collection;

    public function paginate(array $filters, array $columns = ['*'], array $relations = [], array $conditions = [], array $orConditions = [], array $joins = []): LengthAwarePaginator;

    public function find(string|Model $id): ?Model;

    public function findOrFail(string|Model $id): Model;

    public function update(string|Model $id, array $data): bool;

    public function delete(string|Model $id): bool;

    public function count(): int;
}
