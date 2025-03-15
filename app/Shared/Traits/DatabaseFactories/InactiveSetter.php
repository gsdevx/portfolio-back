<?php

declare(strict_types=1);

namespace App\Shared\Traits\DatabaseFactories;

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
