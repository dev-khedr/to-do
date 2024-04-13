<?php

namespace App\Http\Requests\TaskList;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'page' => __('task-list.attributes.page'),
            'perPage' => __('task-list.attributes.perPage'),
            'title' => __('task-list.attributes.title'),
            'description' => __('task-list.attributes.description'),
        ];
    }
}
