<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Statistics\ValueObjects\IP;
use App\Domain\Statistics\Models\PageVisit;
use App\Domain\Statistics\ValueObjects\Path;
use App\Domain\Statistics\ValueObjects\UserAgent;
use App\Domain\Statistics\Repositories\PageVisitRepository;

class PageVisitEloquentRepository implements PageVisitRepository
{
    public function persist(IP $ip, Path $path, UserAgent $userAgent): PageVisit
    {
        return PageVisit::query()->create([
            'ip' => $ip,
            'path' => $path,
            'user_agent' => $userAgent,
        ]);
    }
}
