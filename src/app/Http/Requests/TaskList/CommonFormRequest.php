<?php

namespace App\Http\Requests\TaskList;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'name' => __('admin.name'),
            'email' => __('admin.email'),
            'password' => __('admin.password'),
        ];
    }
}
