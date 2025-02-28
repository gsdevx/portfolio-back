<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkCaseResource;
use App\Models\WorkCase;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkCaseController extends Controller
{
    public function index(GetActiveOrdered $getActiveOrdered): ResourceCollection
    {
        return WorkCaseResource::collection(
            $getActiveOrdered(WorkCase::class)
        );
    }
}
