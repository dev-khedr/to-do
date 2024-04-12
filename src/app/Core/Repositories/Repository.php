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
        protected Model $model
    ) {
        //
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function list(array $filters, array $columns = ['*'], array $relations = []): Collection|LengthAwarePaginator
    {
        return array_key_exists('perPage', $filters) ?
            $this->paginate($filters, $columns, $relations) :
            $this->all($filters, $columns, $relations);
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

    public function all(array $filters = [], array $columns = ['*'], array $relations = []): Collection
    {
        return $this->index($filters, $columns, $relations)->get();
    }

    public function paginate(array $filters, array $columns = ['*'], array $relations = []): LengthAwarePaginator
    {
        return $this->index($filters, $columns, $relations)->paginate(
            $filters['perPage'],
            $filters['page'] ?? null,
        );
    }

    protected function index(array $filters, array $columns = ['*'], array $relations = []): Builder
    {
        return $this->model->filter($filters)
            ->select($columns)
            ->with($relations);
    }

    protected function isModelInstance(string|Model $id): bool
    {
        return $id instanceof Model;
    }
}
