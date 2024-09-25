<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use League\Fractal\TransformerAbstract;
use Raid\Guardian\Authenticators\Contracts\AuthenticatorInterface;

class AuthenticationController extends Controller
{
    protected function authenticationResponse(AuthenticatorInterface $authenticator, TransformerAbstract $transformer): JsonResponse
    {
        return $authenticator->errors()->any() ?
            $this->failedResponse($authenticator) :
            $this->successResponse($authenticator, $transformer);
    }

    protected function successResponse(AuthenticatorInterface $authenticator, TransformerAbstract $transformer): JsonResponse
    {
        return $this->success([
            'channel' => $authenticator->getName(),
            'token' => $authenticator->getStringToken(),
            'resource' => fractal_data(
                $authenticator->getAuthenticatable(),
                $transformer,
            ),
        ]);
    }

    protected function failedResponse(AuthenticatorInterface $authenticator): JsonResponse
    {
        return $this->badRequest(
            $authenticator->errors()->toArray(),
            $authenticator->errors()->first(),
        );
    }
}
