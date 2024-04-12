<?php

namespace App\Http\Controllers\User;

use App\Core\Traits\CrudHandler;
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
        return $this->success(
            fractal_data(
                $this->service->list($request->validated()),
                new Transformer(),
            ),
        );
    }

    public function show(Model $id): JsonResponse
    {
        return $this->success(
            fractal_data(
                $this->service->find($id),
                new Transformer(),
            ),
        );
    }

    public function update(Requests\UpdateRequest $request, $id): JsonResponse
    {
        $this->service->update($id, $request->validated());

        return $this->success(__('message.updated'));
    }

    public function delete($id): JsonResponse
    {
        $this->service->delete($id);

        return $this->success(__('message.deleted'));
    }
}
