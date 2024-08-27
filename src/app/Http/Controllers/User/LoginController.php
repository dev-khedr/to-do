<?php

namespace App\Http\Controllers\User;

use App\Http\Authentication\Authenticators\TwoFactorEmailAuthenticator;
use App\Http\Authentication\Authenticators\TwoFactorPhoneAuthenticator;
use App\Http\Controllers\AuthenticationController;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Services\UserService as Service;
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

    public function loginWithTwoFactorEmail(Requests\LoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->attempt(
                $request->validated(),
                TwoFactorEmailAuthenticator::getName(),
            ),
            new Transformer,
        );
    }

    public function loginWithTwoFactorPhone(Requests\LoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->attempt(
                $request->validated(),
                TwoFactorPhoneAuthenticator::getName(),
            ),
            new Transformer,
        );
    }
}
