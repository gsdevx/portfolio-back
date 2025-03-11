<?php

declare(strict_types=1);

namespace App\Mappers;

use App\Contracts\Model\Mappable;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

readonly class EloquentModelCollectionMapper
{
    public function __construct(
        private Collection $collection,
    ) {}

    public function mapTo(string $method, mixed ...$args): Collection
    {
        return $this->collection->map(static function (Model $model) use ($method, $args): object {
            if (! $model instanceof Mappable) {
                throw new Exception(sprintf('Model should implement %s interface', Mappable::class));
            }

            return $model->mapper()->$method(...$args);
        });
    }
}
