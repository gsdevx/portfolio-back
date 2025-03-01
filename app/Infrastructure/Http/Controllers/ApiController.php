<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class ApiController
{
    public function resource(string $resourceClass, array|object $data): JsonResource
    {
        $this->checkResourceClass($resourceClass);

        /* @var JsonResource $resourceClass */
        return $resourceClass::make($data);
    }

    public function resourceCollection(string $resourceClass, array|object $data): ResourceCollection
    {
        $this->checkResourceClass($resourceClass);

        /* @var JsonResource $resourceClass */
        return $resourceClass::collection($data);
    }

    private function checkResourceClass(string $resourceClass): void
    {
        if (!class_exists($resourceClass)) {
            throw new \InvalidArgumentException(sprintf('Resource "%s" does not exist.', $resourceClass));
        }

        if (!is_subclass_of($resourceClass, JsonResource::class)) {
            throw new \InvalidArgumentException(sprintf('Resource "%s" must implement JsonResource.', $resourceClass));
        }
    }
}
