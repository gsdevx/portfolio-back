<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Education;
use App\Traits\Database\Factories\ActiveSetter;
use App\Traits\Database\Factories\InactiveSetter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Education>
 */
class EducationFactory extends Factory
{
    use ActiveSetter;
    use InactiveSetter;

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
