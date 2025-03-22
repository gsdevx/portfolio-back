<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Cache;

use App\Portfolio\DTO\WorkCaseDTO;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class GetOrRemember
{
    public function workCasesPaginated(int $page, callable $rememberCallback): Paginator
    {
        return cache()->rememberForever('work-cases:paginated:' . $page, $rememberCallback);
    }

    public function workCase(string $slug, callable $rememberCallback): WorkCaseDTO
    {
        return cache()->rememberForever('work-case:' . $slug, $rememberCallback);
    }

    public function similar(string $slug, callable $rememberCallback): Collection
    {
        return cache()->rememberForever('work-case:' . $slug . ':similar', $rememberCallback);
    }
}
