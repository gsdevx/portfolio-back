<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Infrastructure\Http\Resources\ContactResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Domain\Footer\Repositories\ContactRepositoryWithActiveOrderedRecords;

final class ContactController extends ApiController
{
    public function index(ContactRepositoryWithActiveOrderedRecords $repository): ResourceCollection
    {
        return $this->resourceCollection(
            ContactResource::class,
            $repository->findAllActiveOrdered()
        );
    }
}
