<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\WorkCaseResource;
use App\Models\WorkCase;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkCaseController extends ApiController
{
    public function index(GetActiveOrdered $getActiveOrdered): ResourceCollection
    {
        return $this->resourceCollection(WorkCaseResource::class, $getActiveOrdered(WorkCase::class));
    }
}
