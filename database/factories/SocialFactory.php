<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Social;
use App\Traits\Database\Factories\ActiveSetter;
use App\Traits\Database\Factories\InactiveSetter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Social>
 */
class SocialFactory extends Factory
{
    use ActiveSetter;
    use InactiveSetter;

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
