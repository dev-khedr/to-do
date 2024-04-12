<?php

namespace App\Http\Transformers\TaskList;

use App\Models\TaskList;
use League\Fractal\TransformerAbstract;

class TaskListTransformer extends TransformerAbstract
{
    public function transform(TaskList $taskList): array
    {
        return [
            'id' => $taskList->id,
            'createdAt' => $taskList->created_at->toDateTimeString(),
            'updatedAt' => $taskList->updated_at->toDateTimeString(),
        ];
    }
}
