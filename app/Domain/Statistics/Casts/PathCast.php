<?php

declare(strict_types=1);

namespace App\Domain\Statistics\Casts;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Statistics\ValueObjects\Path;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PathCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): Path
    {
        return Path::fromString($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        if (! $value instanceof Path) {
            throw new \InvalidArgumentException(sprintf('The given value "%s" is not an Path instance.', $value));
        }

        return $value->toString();
    }
}
