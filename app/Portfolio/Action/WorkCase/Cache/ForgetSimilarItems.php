<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use App\Portfolio\Models\WorkCase;

class ForgetSimilarItems
{
    public function __invoke(WorkCase $workCase): void
    {
        cache()->forget('work-case:' . $workCase->slug . ':similar');
    }
}
