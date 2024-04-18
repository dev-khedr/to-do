<?php

namespace App\Http\Controllers\User;

use App\Http\Authentication\Channels\EmailTwoFactorChannel;
use App\Http\Authentication\Steps\PhoneTwoFactorStep;
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

    public function emailTwoFactorLogin(Requests\LoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->login(
                $request->validated(),
                EmailTwoFactorChannel::getName(),
            ),
            new Transformer,
        );
    }

    public function phoneTwoFactorLogin(Requests\LoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->login(
                $request->validated(),
                PhoneTwoFactorStep::getName(),
            ),
            new Transformer,
        );
    }
}
