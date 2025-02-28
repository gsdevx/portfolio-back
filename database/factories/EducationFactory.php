<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Education>
 */
class EducationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'institution_name' => $this->faker->company(),
            'profession' => $this->faker->jobTitle(),
            'description' => $this->faker->text(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'order' => $this->faker->randomDigit(),
        ];
    }
}
