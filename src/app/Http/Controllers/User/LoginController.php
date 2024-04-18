<?php

namespace App\Http\Controllers\User;

use App\Http\Authentication\Channels\TwoFactorEmailChannel;
use App\Http\Authentication\Channels\TwoFactorPhoneChannel;
use App\Http\Authentication\Steps\TwoFactorPhoneStep;
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
            $this->getService()->login($request->validated()),
            new Transformer,
        );
    }

    public function loginWithTwoFactorEmail(Requests\LoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->login(
                $request->validated(),
                TwoFactorEmailChannel::getName(),
            ),
            new Transformer,
        );
    }

    public function loginWithTwoFactorPhone(Requests\LoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->login(
                $request->validated(),
                TwoFactorPhoneChannel::getName(),
            ),
            new Transformer,
        );
    }
}
