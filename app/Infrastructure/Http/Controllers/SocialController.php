<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Domain\Footer\Repositories\SocialRepositoryWithActiveOrderedRecords;
use App\Infrastructure\Http\Resources\SocialResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class SocialController extends ApiController
{
    public function index(SocialRepositoryWithActiveOrderedRecords $repository): ResourceCollection
    {
        return $this->resourceCollection(SocialResource::class, $repository->findAllActiveOrdered());
    }
}
