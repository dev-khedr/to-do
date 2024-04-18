<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Services\UserService as Service;
use Exception;
use Illuminate\Http\JsonResponse;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;

class LoginController extends Controller
{
    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    public function login(Requests\LoginRequest $request): JsonResponse
    {
        $channel = $this->service()->login($request->validated());

        return $channel->errors()->any() ?
            $this->successResponse($channel) :
            $this->failedResponse($channel);

    }

    public function emailTwoFactorLogin()
    {

    }

    public function phoneTwoFactorLogin()
    {

    }

    private function successResponse(ChannelInterface $channel): JsonResponse
    {
        return $this->success([
            'channel' => $channel->getName(),
            'token' => $channel->getStringToken(),
            'resource' => fractal_data(
                $channel->getAuthenticatable(),
                new Transformer,
            ),
        ]);
    }

    private function failedResponse(ChannelInterface $channel): JsonResponse
    {
        return $this->badRequest(
            $channel->errors()->toArray(),
            $channel->errors()->first(),
        );
    }
}
