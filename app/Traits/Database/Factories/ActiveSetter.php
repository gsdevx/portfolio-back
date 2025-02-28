<?php

declare(strict_types=1);

namespace App\Traits\Database\Factories;

/**
 * @method state(callable|array $state)
 */
trait ActiveSetter
{
    public function active(): static
    {
        return $this->state(fn(array $attributes): array => [
            'is_active' => true,
        ]);
    }
}
