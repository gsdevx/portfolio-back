<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use Illuminate\Support\Collection;

class GetOrRememberSimilarItems
{
    public function __invoke(string $slug, callable $rememberCallback): Collection
    {
        return cache()->rememberForever('work-case:' . $slug . ':similar', $rememberCallback);
    }
}
