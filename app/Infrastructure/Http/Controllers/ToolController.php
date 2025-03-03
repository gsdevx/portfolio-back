<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Infrastructure\Http\Resources\ToolResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Domain\AboutMe\Repositories\ToolRepositoryWithActiveOrderedRecords;

final class ToolController extends ApiController
{
    public function index(ToolRepositoryWithActiveOrderedRecords $repository): ResourceCollection
    {
        return $this->resourceCollection(ToolResource::class, $repository->findAllActiveOrdered());
    }
}
