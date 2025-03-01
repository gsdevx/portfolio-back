<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Domain\AboutMe\Repositories\EducationRepositoryWithActiveOrderedRecords;
use App\Infrastructure\Http\Resources\EducationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class EducationController extends ApiController
{
    public function index(EducationRepositoryWithActiveOrderedRecords $repository): ResourceCollection
    {
        return $this->resourceCollection(EducationResource::class, $repository->findAllActiveOrdered());
    }
}
