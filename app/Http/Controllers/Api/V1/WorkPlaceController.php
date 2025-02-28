<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\WorkPlaceResource;
use App\Models\WorkPlace;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkPlaceController extends ApiController
{
    public function index(GetActiveOrdered $activeOrdered): ResourceCollection
    {
        return $this->resourceCollection(WorkPlaceResource::class, $activeOrdered(WorkPlace::class));
    }
}
