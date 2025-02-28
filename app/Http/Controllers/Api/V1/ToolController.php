<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\ToolResource;
use App\Models\Tool;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ToolController extends ApiController
{
    public function index(GetActiveOrdered $activeOrdered): ResourceCollection
    {
        return $this->resourceCollection(ToolResource::class, $activeOrdered(Tool::class));
    }
}
