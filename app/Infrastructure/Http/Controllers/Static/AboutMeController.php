<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers\Static;

use App\Domain\AboutMe\Settings\AboutMeSettings;
use App\Infrastructure\Http\Controllers\ApiController;
use App\Infrastructure\Http\Resources\AboutMeStaticResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class AboutMeController extends ApiController
{
    public function __invoke(AboutMeSettings $settings): JsonResource
    {
        return $this->resource(AboutMeStaticResource::class, $settings);
    }
}
