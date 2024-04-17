<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Services\UserService as Service;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __construct(Service $service)
    {
        config(['auth.defaults.guard' => 'user']);

        $this->setService($service);
    }

    public function login(Requests\LoginRequest $request): JsonResponse
    {
        $start = microtime(true);

        $token = $this->service()->login($request->validated());

        $end = microtime(true) - $start;

        dump($end);

        return $this->success([
            'token' => $token,
            'resource' => fractal_data(
                auth()->user(),
                new Transformer,
            ),
        ]);
    }
}
