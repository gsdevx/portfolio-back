<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Portfolio\Models\Tool;
use App\Shared\Traits\DatabaseFactories\ActiveSetter;
use App\Shared\Traits\DatabaseFactories\InactiveSetter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tool>
 */
class ToolFactory extends Factory
{
    use ActiveSetter;
    use InactiveSetter;

    protected $model = Tool::class;

    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'title' => $this->faker->word(),
            'order' => $this->faker->randomDigit(),
        ];
    }
}
