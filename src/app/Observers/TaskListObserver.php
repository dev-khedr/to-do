<?php

namespace App\Observers;

use App\Models\TaskList;

class TaskListObserver
{
    public function creating(TaskList $taskList): void
    {
        if (! auth()->check()) {
            return;
        }

        $taskList->setAttribute('user_id', auth()->id());
    }
}
