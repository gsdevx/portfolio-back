<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Controller;
use App\Http\Resources\SocialResource;
use App\Models\Social;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SocialController extends Controller
{
    public function index(GetActiveOrdered $getActiveOrdered): ResourceCollection
    {
        return SocialResource::collection(
            $getActiveOrdered(Social::class)
        );
    }
}
