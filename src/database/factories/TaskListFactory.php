<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TaskListFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'description' => fake()->text,
        ];
    }
}
