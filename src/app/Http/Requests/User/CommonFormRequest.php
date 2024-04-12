<?php

namespace App\Http\Requests\User;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'name' => __('user.name'),
            'email' => __('user.email'),
            'password' => __('user.password'),
        ];
    }
}
