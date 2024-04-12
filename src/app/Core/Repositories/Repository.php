<?php

namespace App\Core\Repositories;

use App\Core\Repositories\Contracts\RepositoryInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository implements RepositoryInterface
{
    public function __construct(
        protected readonly Model $model
    ) {
        //
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function list(array $filters, array $columns = ['*'], array $relations = [], array $conditions = [], array $orConditions = [], array $joins = []): Collection|LengthAwarePaginator
    {
        return array_key_exists('perPage', $filters) ?
            $this->paginate($filters, $columns, $relations) :
            $this->all($filters, $columns, $relations);
    }

    public function all(array $filters, array $columns = ['*'], array $relations = [], array $conditions = [], array $orConditions = [], array $joins = []): Collection
    {
        return $this->query($filters, $columns, $relations, $conditions, $orConditions, $joins)->get();
    }

    public function paginate(array $filters, array $columns = ['*'], array $relations = [], array $conditions = [], array $orConditions = [], array $joins = []): LengthAwarePaginator
    {
        return $this->query($filters, $columns, $relations, $conditions, $orConditions, $joins)->paginate(
            $filters['perPage'],
            $filters['page'] ?? null,
        );
    }

    public function find(string|Model $id): ?Model
    {
        return $this->isModelInstance($id) ?
            $id :
            $this->model->find($id);
    }

    public function findOrFail(string|Model $id): Model
    {
        return $this->isModelInstance($id) ?
            $id :
            $this->model->findOrFail($id);
    }

    public function update(string|Model $id, array $data): bool
    {
        return $this->isModelInstance($id) ?
            $id->update($data) :
            $this->findOrFail($id)->update($data);
    }

    public function delete(string|Model $id): bool
    {
        return $this->isModelInstance($id) ?
            $id->delete() :
            $this->findOrFail($id)->delete();
    }

    public function count(): int
    {
        return $this->model->count();
    }

    protected function query(array $filters, array $columns = ['*'], array $relations = [], array $conditions = [], array $orConditions = [], array $joins = []): Builder
    {
        return $this->model->filter($filters)
            ->select($columns)
            ->with($relations)
            ->where($conditions)
            ->orWhere($orConditions);
    }

    protected function isModelInstance(string|Model $id): bool
    {
        return $id instanceof Model;
    }
}
