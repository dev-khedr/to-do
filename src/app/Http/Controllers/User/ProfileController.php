<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User as Requests;
use App\Http\Transformers\User\UserTransformer as Transformer;
use App\Services\UserService as Service;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function __construct(Service $service)
    {
        $this->setService($service);
    }

    public function get(): JsonResponse
    {
        return $this->success([
            'resource' => fractal_data(
                $this->service()->getProfile(),
                new Transformer,
            )
        ]);
    }

    public function update(Requests\LoginRequest $request): JsonResponse
    {
        $this->service()->updateProfile($request->validated());

        return $this->success(message: __('message.profile_updated'));
    }


    public function updatePassword(Requests\LoginRequest $request): JsonResponse
    {
        $token = $this->service()->updatePassword($request->validated());

        return $this->success(message: __('message.password_updated'));
    }

    public function logout(): JsonResponse
    {
        $this->service()->logout();

        return $this->success(message: __('auth.logged_out'));
    }
}
