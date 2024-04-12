<?php

namespace App\Core\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function notFound(string $message = 'Not found'): JsonResponse
    {
        return $this->error($message, 404);
    }

    public function forbidden(string $message = 'Forbidden'): JsonResponse
    {
        return $this->error($message, 403);
    }

    public function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return $this->error($message, 401);
    }

    public function created(string $message = 'Created'): JsonResponse
    {
        return $this->success(['message' => $message], 201);
    }

    public function updated(string $message = 'Updated'): JsonResponse
    {
        return $this->success(['message' => $message]);
    }

    public function deleted(string $message = 'Deleted'): JsonResponse
    {
        return $this->success(['message' => $message]);
    }

    public function badRequest(string $message = 'Bad request'): JsonResponse
    {
        return $this->error($message, 400);
    }

    public function unprocessable(string $message = 'Unprocessable'): JsonResponse
    {
        return $this->error($message, 422);
    }

    public function success(array $data = [], int $code = 200): JsonResponse
    {
        $response['success'] = true;

        $response['message'] = array_key_exists('message', $data) ? $data['message'] : '';

        $response['data'] = array_key_exists('data', $data) ? $data['data'] : $data;

        $response['meta'] = array_key_exists('meta', $data) ? $data['meta'] : null;

        return response()->json($response, $code);
    }

    public function error(string $message, int $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
