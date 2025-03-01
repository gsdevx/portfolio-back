<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers\Static;

use App\Domain\Settings\GeneralSettings;
use App\Infrastructure\Http\Controllers\ApiController;
use App\Infrastructure\Http\Resources\GeneralSettingsResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class GeneralSettingsController extends ApiController
{
    public function __invoke(GeneralSettings $settings): JsonResource
    {
        return $this->resource(GeneralSettingsResource::class, $settings);
    }
}
