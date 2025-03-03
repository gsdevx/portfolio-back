<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers\Static;

use App\Domain\Settings\GeneralSettings;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Infrastructure\Http\Controllers\ApiController;
use App\Infrastructure\Http\Resources\GeneralSettingsResource;

final class GeneralSettingsController extends ApiController
{
    public function __invoke(GeneralSettings $settings): JsonResource
    {
        return $this->resource(GeneralSettingsResource::class, $settings);
    }
}
