<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Services\UserService as Service;
use Exception;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    public function login(Requests\LoginRequest $request): JsonResponse
    {
        $channel = $this->service()->login($request->validated());

        if ($channel->errors()->any()) {
            return $this->badRequest(
                $channel->errors()->toArray(),
                $channel->errors()->first(),
            );
        }

        return $this->success([
            'token' => $channel->getStringToken(),
            'resource' => fractal_data(
                auth()->user(),
                new Transformer,
            ),
        ]);
    }
}
