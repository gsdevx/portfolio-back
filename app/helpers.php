<?php

declare(strict_types=1);

use App\Mappers\EloquentModelCollectionMapper;
use Illuminate\Support\Collection;

if (! function_exists('map_model_collection')) {
    function map_model_collection(Collection $collection, string $method, mixed ...$args): Collection
    {
        $mapper = new EloquentModelCollectionMapper($collection);

        return $mapper->mapTo($method, ...$args);
    }
}
