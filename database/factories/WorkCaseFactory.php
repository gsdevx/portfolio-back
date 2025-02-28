<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\WorkCase;
use App\Traits\Database\Factories\ActiveSetter;
use App\Traits\Database\Factories\InactiveSetter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkCase>
 */
class WorkCaseFactory extends Factory
{
    use ActiveSetter;
    use InactiveSetter;

    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'summary' => $this->faker->paragraph(),
            'tags' => [
                $this->faker->word(),
                $this->faker->word(),
            ],
            'order' => $this->faker->randomDigit(),
        ];
    }
}
