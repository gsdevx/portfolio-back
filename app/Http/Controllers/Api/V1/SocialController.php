<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\SocialResource;
use App\Models\Social;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SocialController extends ApiController
{
    public function index(GetActiveOrdered $getActiveOrdered): ResourceCollection
    {
        return $this->resourceCollection(SocialResource::class, $getActiveOrdered(Social::class));
    }
}
