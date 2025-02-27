<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPlaceResource;
use App\Models\WorkPlace;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkPlaceController extends Controller
{
    public function index(GetActiveOrdered $activeOrdered): ResourceCollection
    {
        return WorkPlaceResource::collection(
            $activeOrdered(WorkPlace::class)
        );
    }
}
