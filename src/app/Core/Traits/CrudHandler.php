<?php

namespace App\Core\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait CrudHandler
{
    protected function storeResource(array $data, string $message = 'message.created'): JsonResponse
    {
        $this->service->create($data);

        return $this->created(__($message));
    }
}
