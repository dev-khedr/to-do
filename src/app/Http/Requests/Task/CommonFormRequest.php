<?php

namespace App\Http\Requests\Task;

trait CommonFormRequest
{
    public function attributes(): array
    {
        return [
            'page' => __('task.attributes.page'),
            'perPage' => __('task.attributes.perPage'),
            'title' => __('task.attributes.title'),
            'description' => __('task.attributes.description'),
            'startDate' => __('task.attributes.startDate'),
            'dueDate' => __('task.attributes.dueDate'),
        ];
    }
}
