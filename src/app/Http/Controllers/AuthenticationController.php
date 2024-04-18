<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use League\Fractal\TransformerAbstract;
use Raid\Core\Authentication\Channels\Contracts\ChannelInterface;

class AuthenticationController extends Controller
{
    protected function authenticationResponse(ChannelInterface $channel, TransformerAbstract $transformer): JsonResponse
    {
        return $channel->errors()->any() ?
            $this->failedResponse($channel) :
            $this->successResponse($channel, $transformer);
    }

    protected function successResponse(ChannelInterface $channel, TransformerAbstract $transformer): JsonResponse
    {
        return $this->success([
            'channel' => $channel->getName(),
            'token' => $channel->getStringToken(),
            'resource' => fractal_data(
                $channel->getAuthenticatable(),
                $transformer,
            ),
        ]);
    }

    protected function failedResponse(ChannelInterface $channel): JsonResponse
    {
        return $this->badRequest(
            $channel->errors()->toArray(),
            $channel->errors()->first(),
        );
    }
}
