<?php

namespace Database\Factories;

use App\Models\Social;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Social>
 */
class SocialFactory extends Factory
{

    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'title' => $this->faker->word(),
            'url' => $this->faker->url(),
            'order' => $this->faker->randomDigit(),
        ];
    }
}
