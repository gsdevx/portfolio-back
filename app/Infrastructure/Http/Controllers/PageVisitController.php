<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Infrastructure\Http\Requests\PageVisitRequest;
use App\Infrastructure\Actions\PageVisit\CreateFromRequestAction;

final class PageVisitController extends ApiController
{
    public function __invoke(PageVisitRequest $request, CreateFromRequestAction $create): void
    {
        $create($request);
    }
}
