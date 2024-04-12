<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use App\Http\Transformers\Admin\AdminTransformer as Transformer;
use App\Services\AdminService as Service;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __construct(Service $service)
    {
        config(['auth.defaults.guard' => 'admin']);

        $this->setService($service);
    }

    public function login(Requests\LoginRequest $request): JsonResponse
    {
        $token = $this->service()->login($request->validated());

        return $this->success([
            'token' => $token,
            'resource' => fractal_data(
                auth()->user(),
                new Transformer,
            )
        ]);
    }
}
