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
        $this->setService($service);
    }

    public function login(Requests\LoginRequest $request): JsonResponse
    {
        $channel = $this->service()->login($request->validated());

        if ($channel->errors()->any()) {
            return $this->badRequest(
                $channel->errors()->toArray(),
                $channel->errors()->first(),
            );
        }

        return $this->success([
            'token' => $channel->getStringToken(),
            'resource' => fractal_data(
                auth()->user(),
                new Transformer,
            ),
        ]);
    }
}
