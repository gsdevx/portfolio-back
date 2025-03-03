<?php

declare(strict_types=1);

namespace App\Domain\Statistics\Repositories;

use App\Domain\Statistics\ValueObjects\IP;
use App\Domain\Statistics\Models\PageVisit;
use App\Domain\Statistics\ValueObjects\Path;
use App\Domain\Statistics\ValueObjects\UserAgent;

interface PageVisitRepository
{
    public function persist(IP $ip, Path $path, UserAgent $userAgent): PageVisit;
}
