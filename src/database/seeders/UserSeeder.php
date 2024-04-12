<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create();
    }
}
