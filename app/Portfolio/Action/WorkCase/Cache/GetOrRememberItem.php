<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use App\Portfolio\DTO\WorkCaseDTO;

class GetOrRememberItem
{
    public function __invoke(string $slug, callable $rememberCallback): ?WorkCaseDTO
    {
        return cache()->rememberForever('work-case:' . $slug, $rememberCallback);
    }
}
