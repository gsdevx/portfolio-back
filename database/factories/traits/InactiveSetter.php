<?php

declare(strict_types=1);

namespace Database\Factories\Traits;

/**
 * @method state(callable|array $state)
 */
trait InactiveSetter
{
    public function inactive(): static
    {
        return $this->state(fn (array $attributes): array => [
            'is_active' => false,
        ]);
    }
}
