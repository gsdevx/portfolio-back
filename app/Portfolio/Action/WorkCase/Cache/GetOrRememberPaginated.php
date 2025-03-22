<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use Illuminate\Contracts\Pagination\Paginator;

class GetOrRememberPaginated
{
    public function __invoke(int $page, callable $rememberCallback): Paginator
    {
        return cache()->rememberForever('work-cases:paginated:' . $page, $rememberCallback);
    }
}
