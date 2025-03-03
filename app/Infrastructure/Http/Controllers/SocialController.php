<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Infrastructure\Http\Resources\SocialResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Domain\Footer\Repositories\SocialRepositoryWithActiveOrderedRecords;

final class SocialController extends ApiController
{
    public function index(SocialRepositoryWithActiveOrderedRecords $repository): ResourceCollection
    {
        return $this->resourceCollection(SocialResource::class, $repository->findAllActiveOrdered());
    }
}
