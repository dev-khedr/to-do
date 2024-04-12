<?php

namespace App\Core\Utilities;

use App\Core\Traits\Responseable as ApiResponseTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class RenderException
{
    use ApiResponseTrait;

    public static function new(): static
    {
        return new static();
    }

    public function render(Throwable $e, Request $request)
    {
        switch ($e) {
            case $e instanceof ModelNotFoundException:
            case $e instanceof NotFoundHttpException:
                return $this->notFound(__('message.not_found'));

            case $e instanceof ValidationException:
                return $this->unprocessable($e->errors(), $e->getMessage());

            case $e instanceof AuthenticationException:
                return $this->unauthorized($e->getMessage());
        }
    }
}
