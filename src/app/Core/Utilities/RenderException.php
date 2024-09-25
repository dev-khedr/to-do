<?php

namespace App\Core\Utilities;

use App\Core\Traits\Responseable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class RenderException
{
    use Responseable;

    public static function new(): static
    {
        return new static;
    }

    public function render(Throwable $e, Request $request): ?JsonResponse
    {
        return match (true) {
            $e instanceof ModelNotFoundException, $e instanceof NotFoundHttpException => $this->renderNotFound($e, $request),
            $e instanceof ValidationException => $this->renderUnprocessable($e, $request),
            $e instanceof AuthenticationException => $this->renderUnauthorized($e, $request),
            default => null,
        };
    }

    private function renderNotFound(ModelNotFoundException|NotFoundHttpException $e, Request $request): JsonResponse
    {
        return $this->notFound(__('message.not_found'));
    }

    private function renderUnprocessable(ValidationException $e, Request $request): JsonResponse
    {
        return $this->unprocessable($e->errors(), $e->getMessage());
    }

    private function renderUnauthorized(AuthenticationException $e, Request $request): JsonResponse
    {
        return $this->unauthorized($e->getMessage());
    }
}
