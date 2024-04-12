<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Transformers\Admin\AdminTransformer as Transformer;
use App\Models\Admin as Model;
use App\Services\AdminService;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    public function __construct(AdminService $service)
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
