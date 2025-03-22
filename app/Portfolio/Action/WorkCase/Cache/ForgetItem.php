<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use App\Portfolio\Models\WorkCase;

class ForgetItem
{
    public function __invoke(WorkCase $workCase, bool $withSimilar = false): void
    {
        cache()->forget('work-case:' . $workCase->slug);

        if ($withSimilar) {
            (new ForgetSimilarItems)($workCase);
        }
    }
}
