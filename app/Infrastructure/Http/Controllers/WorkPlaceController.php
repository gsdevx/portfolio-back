<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Domain\AboutMe\Repositories\WorkPlaceRepositoryWithActiveOrderedRecords;
use App\Infrastructure\Http\Resources\WorkPlaceResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class WorkPlaceController extends ApiController
{
    public function index(WorkPlaceRepositoryWithActiveOrderedRecords $repository): ResourceCollection
    {
        return $this->resourceCollection(WorkPlaceResource::class, $repository->findAllActiveOrdered());
    }
}
