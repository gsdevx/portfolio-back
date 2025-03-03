<?php

declare(strict_types=1);

namespace App\Domain\Statistics\Casts;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Statistics\ValueObjects\UserAgent;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UserAgentCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): UserAgent
    {
        return UserAgent::fromString($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        if (! $value instanceof UserAgent) {
            throw new \InvalidArgumentException(sprintf('The given value "%s" is not an UserAgent instance.', $value));
        }

        return $value->toString();
    }
}
