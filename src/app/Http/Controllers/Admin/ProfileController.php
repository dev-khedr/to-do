<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin as Requests;
use App\Http\Transformers\Admin\AdminTransformer as Transformer;
use App\Services\AdminService as Service;
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
                $this->getService()->getProfile(),
                new Transformer,
            ),
        ]);
    }

    public function update(Requests\UpdateProfileRequest $request): JsonResponse
    {
        $this->getService()->updateProfile($request->validated());

        return $this->success(message: __('message.profile_updated'));
    }

    public function updatePassword(Requests\UpdateProfilePasswordRequest $request): JsonResponse
    {
        $this->getService()->updatePassword($request->validated());

        return $this->success(message: __('message.password_updated'));
    }

    public function logout(): JsonResponse
    {
        $this->getService()->logout();

        return $this->success(message: __('auth.logged_out'));
    }
}
