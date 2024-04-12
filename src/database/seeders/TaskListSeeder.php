<?php

namespace Database\Seeders;

use App\Models\TaskList;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskListSeeder extends Seeder
{
    public function run(): void
    {
        TaskList::factory()
            ->for(User::factory())
            ->create();
    }
}
