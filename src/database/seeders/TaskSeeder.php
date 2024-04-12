<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\User;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::factory()
            ->for(TaskList::factory()->for(User::factory()))
            ->create();
    }
}
