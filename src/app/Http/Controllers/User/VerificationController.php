<?php

namespace App\Http\Controllers\User;

use App\Http\Authentication\Authenticators\TwoFactorEmailAuthenticator;
use App\Http\Authentication\Authenticators\TwoFactorPhoneAuthenticator;
use App\Http\Controllers\AuthenticationController;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Services\UserService as Service;
use Illuminate\Http\JsonResponse;

class VerificationController extends AuthenticationController
{
    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    public function verifyTwoFactor(Requests\VerifyTwoFactorRequest $request): JsonResponse
    {
        $user = $this->getService()->find($request->input('verifiableId'));

        return $this->authenticationResponse(
            $this->getService()->login($user, $this->getChannel($request->route('type'))),
            new Transformer,
        );
    }

    private function getChannel(string $type): string
    {
        return $type === 'phone' ?
            TwoFactorPhoneAuthenticator::getName() :
            TwoFactorEmailAuthenticator::getName();
    }
}
