<?php

namespace App\Core\Services;

use App\Core\Repositories\Contracts\RepositoryInterface;
use App\Core\Services\Contracts\ServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Service implements ServiceInterface
{
    protected RepositoryInterface $repository;

    protected function setRepository(RepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    protected function getRepository(): RepositoryInterface
    {
        return $this->repository;
    }

    public function create(array $data): Model
    {
        return $this->getRepository()->create($data);
    }

    public function list(array $filters, array $columns = ['*'], array $relations = []): Collection|LengthAwarePaginator
    {
        return $this->getRepository()->list($filters, $columns, $relations);
    }

    public function find(string|Model $id): Model
    {
        return $this->getRepository()->findOrFail($id);
    }

    public function update(string|Model $id, array $data): bool
    {
        return $this->getRepository()->update($id, $data);
    }

    public function delete(string|Model $id): bool
    {
        return $this->getRepository()->delete($id);
    }
}
