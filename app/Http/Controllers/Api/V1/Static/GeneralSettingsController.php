<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Static;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\GeneralSettingsResource;
use App\Settings\GeneralSettings;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralSettingsController extends ApiController
{
    public function __invoke(GeneralSettings $settings): JsonResource
    {
        return $this->resource(GeneralSettingsResource::class, $settings);
    }
}
