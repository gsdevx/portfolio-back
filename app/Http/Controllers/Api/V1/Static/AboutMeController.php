<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Static;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutMeStaticResource;
use App\Settings\AboutMeSettings;

class AboutMeController extends Controller
{
    public function __invoke(AboutMeSettings $settings): AboutMeStaticResource
    {
        return AboutMeStaticResource::make($settings);
    }
}
