<?php

namespace App\Http\Controllers\User;

use App\Http\Authentication\Authenticators\GoogleAuthenticator;
use App\Http\Controllers\AuthenticationController;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Services\UserService as Service;
use Illuminate\Http\JsonResponse;

class GoogleLoginController extends AuthenticationController
{
    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    public function login(Requests\GoogleLoginRequest $request): JsonResponse
    {
        return $this->authenticationResponse(
            $this->getService()->attempt(
                $request->validated(),
                GoogleAuthenticator::getName(),
            ),
            new Transformer,
        );
    }
}
