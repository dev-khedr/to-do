<?php

namespace App\Http\Controllers\TaskList;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskList as Requests;
use App\Http\Transformers\TaskList\TaskListTransformer as Transformer;
use App\Models\TaskList as Model;
use App\Services\TaskListService as Service;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    public function store(Requests\StoreRequest $request): JsonResponse
    {
        return $this->storeResource($request->validated());
    }

    public function index(Requests\IndexRequest $request): JsonResponse
    {
        return $this->listResources(
            $request->validated(),
            new Transformer,
        );
    }

    public function show(Model $id): JsonResponse
    {
        return $this->showResource(
            $id,
            new Transformer,
        );
    }

    public function update(Requests\UpdateRequest $request, Model $id): JsonResponse
    {
        return $this->updateResource(
            $request->validated(),
            $id,
        );
    }

    public function delete(Model $id): JsonResponse
    {
        return $this->deleteResource($id);
    }
}
