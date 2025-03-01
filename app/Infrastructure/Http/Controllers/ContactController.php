<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Domain\Footer\Repositories\ContactRepositoryWithActiveOrderedRecords;
use App\Infrastructure\Http\Resources\ContactResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
