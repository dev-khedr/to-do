<?php

namespace App\Http\Requests\User;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'page' => __('user.attributes.page'),
            'perPage' => __('user.attributes.perPage'),
            'name' => __('user.attributes.name'),
            'email' => __('user.attributes.email'),
            'password' => __('user.attributes.password'),
            'verifiableId' => __('user.attributes.verifiableId'),
            'code' => __('user.attributes.code'),
        ];
    }
}
