<?php

namespace App\Http\Requests\User;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'name' => __('user.attributes.name'),
            'email' => __('user.attributes.email'),
            'password' => __('user.attributes.password'),
        ];
    }
}
