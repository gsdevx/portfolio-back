<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers\Static;

use App\Domain\AboutMe\Settings\AboutMeSettings;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Infrastructure\Http\Controllers\ApiController;
use App\Infrastructure\Http\Resources\AboutMeStaticResource;

final class AboutMeController extends ApiController
{
    public function __invoke(AboutMeSettings $settings): JsonResource
    {
        return $this->resource(AboutMeStaticResource::class, $settings);
    }
}
