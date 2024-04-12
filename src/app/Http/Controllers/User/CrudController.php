<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Models\User as Model;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class CrudController extends Controller
{
    public function __construct(UserService $service)
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
