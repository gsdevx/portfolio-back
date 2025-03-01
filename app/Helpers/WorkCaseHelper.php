<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\WorkCase;

class WorkCaseHelper
{
    public static function resolveFrontendUri(WorkCase $case): string
    {
        return config('app.frontend_url') . '/cases/' . $case->slug;
    }
}
