<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Social;
use App\Shared\Traits\DatabaseFactories\ActiveSetter;
use App\Shared\Traits\DatabaseFactories\InactiveSetter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Social>
 */
class SocialFactory extends Factory
{
    use ActiveSetter;
    use InactiveSetter;

    protected $model = Social::class;

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
