<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Portfolio\Models\WorkPlace;
use Database\Factories\Traits\ActiveSetter;
use Database\Factories\Traits\InactiveSetter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkPlace>
 */
class WorkPlaceFactory extends Factory
{
    use ActiveSetter;
    use InactiveSetter;

    protected $model = WorkPlace::class;

    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'company_name' => $this->faker->company(),
            'job_title' => $this->faker->jobTitle(),
            'description' => $this->faker->text(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'order' => $this->faker->randomDigit(),
        ];
    }
}
