<?php

namespace App\Http\Requests\Task;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'name' => __('task.attributes.name'),
            'email' => __('task.attributes.email'),
            'password' => __('task.attributes.password'),
        ];
    }
}
