<?php

declare(strict_types=1);

namespace App\Portfolio\Action\Education\Cache;

use Illuminate\Support\Collection;

class GetOrRememberItems
{
    public function __invoke(callable $rememberCallback): Collection
    {
        return cache()->rememberForever('educations', $rememberCallback);
    }
}
