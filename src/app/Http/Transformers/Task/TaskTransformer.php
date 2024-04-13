<?php

namespace App\Http\Transformers\Task;

use App\Models\Task;
use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract
{
    public function transform(Task $task): array
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
            'startDate' => $task->start_date->toDateTimeString(),
            'dueDate' => $task->due_date->toDateTimeString(),
            'createdAt' => $task->created_at->toDateTimeString(),
            'updatedAt' => $task->updated_at->toDateTimeString(),
        ];
    }
}
