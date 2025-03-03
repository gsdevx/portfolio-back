<?php

declare(strict_types=1);

namespace App\Domain\Statistics\Casts;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Statistics\ValueObjects\IP;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class IPCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): IP
    {
        return IP::fromString($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        if (! $value instanceof IP) {
            throw new \InvalidArgumentException(sprintf('The given value "%s" is not an IP instance.', $value));
        }

        return $value->toString();
    }
}
