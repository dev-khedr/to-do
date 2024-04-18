<?php

namespace App\Core\Traits\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use League\Fractal\TransformerAbstract;

trait Crudable
{
    protected function storeResource(array $data, string $message = 'message.created'): JsonResponse
    {
        $this->getService()->create($data);

        return $this->created(message: __($message));
    }

    protected function updateResource(array $data, string|Model $id, string $message = 'message.updated'): JsonResponse
    {
        $this->getService()->update($id, $data);

        return $this->updated(message: __($message));
    }

    protected function deleteResource(string|Model $id, string $message = 'message.deleted'): JsonResponse
    {
        $this->getService()->delete($id);

        return $this->deleted(message: __($message));
    }

    protected function listResources(array $filters, TransformerAbstract $transformer): JsonResponse
    {
        return $this->success(
            fractal_data(
                $this->getService()->list($filters),
                $transformer,
            ),
        );
    }

    protected function showResource(string|Model $id, TransformerAbstract $transformer): JsonResponse
    {
        return $this->success(
            fractal_data(
                $this->getService()->find($id),
                $transformer,
            )
        );
    }
}
