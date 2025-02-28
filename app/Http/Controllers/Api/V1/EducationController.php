<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EducationController extends ApiController
{
    public function index(GetActiveOrdered $activeOrdered): ResourceCollection
    {
        return $this->resourceCollection(EducationResource::class, $activeOrdered(Education::class));
    }
}
