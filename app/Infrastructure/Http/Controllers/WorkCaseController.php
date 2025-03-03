<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Domain\WorkCase\Models\WorkCase;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\WorkCase\Exceptions\WorkCaseNotFound;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Infrastructure\Http\Resources\WorkCaseResource;
use App\Domain\WorkCase\Repositories\WorkCaseRepository;

final class WorkCaseController extends ApiController
{
    public function __construct(
        private readonly WorkCaseRepository $repository
    ) {}

    public function index(): ResourceCollection
    {
        return $this->resourceCollection(WorkCaseResource::class, $this->repository->findAllActiveOrdered());
    }

    public function show(WorkCase $case): JsonResource
    {
        if (! $case->is_active) {
            throw new WorkCaseNotFound;
        }

        return $this->resource(WorkCaseResource::class, $case);
    }
}
