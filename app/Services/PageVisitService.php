<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\PageVisitDTO;
use App\Models\PageVisit;

class PageVisitService
{
    public static function makeRecord(PageVisitDTO $dto): void
    {
        PageVisit::query()->create([
            'ip' => $dto->ip,
            'path' => $dto->path,
            'user_agent' => $dto->userAgent,
        ]);
    }
}
