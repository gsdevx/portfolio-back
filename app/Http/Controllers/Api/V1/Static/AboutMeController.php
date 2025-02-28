<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Static;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\AboutMeStaticResource;
use App\Settings\AboutMeSettings;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutMeController extends ApiController
{
    public function __invoke(AboutMeSettings $settings): JsonResource
    {
        return $this->resource(AboutMeStaticResource::class, $settings);
    }
}
