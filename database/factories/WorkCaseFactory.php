<?php

namespace Database\Factories;

use App\Models\WorkCase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkCase>
 */
class WorkCaseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'tags' => [
                $this->faker->word(),
                $this->faker->word(),
            ],
            'order' => $this->faker->randomDigit(),
        ];
    }
}
