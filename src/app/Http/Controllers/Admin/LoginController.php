<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AuthenticationController;
use App\Http\Requests\Admin as Requests;
use App\Http\Transformers\Admin\AdminTransformer as Transformer;
use App\Services\AdminService as Service;
use Illuminate\Http\JsonResponse;

class LoginController extends AuthenticationController
{
    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    public function login(Requests\LoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->attempt($request->validated()),
            new Transformer,
        );
    }
}
