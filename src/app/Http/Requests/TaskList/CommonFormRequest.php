<?php

namespace App\Http\Requests\TaskList;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'name' => __('task-list.attributes.name'),
            'email' => __('task-list.attributes.email'),
            'password' => __('task-list.attributes.password'),
        ];
    }
}
