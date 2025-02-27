<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Controller;
use App\Http\Resources\ToolResource;
use App\Models\Tool;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ToolController extends Controller
{
    public function index(GetActiveOrdered $activeOrdered): ResourceCollection
    {
        return ToolResource::collection(
            $activeOrdered(Tool::class)
        );
    }
}
