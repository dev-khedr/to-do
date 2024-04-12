<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'description' => fake()->text,
            'start_date' => fake()->date,
            'due_date' => fake()->date,
        ];
    }
}
