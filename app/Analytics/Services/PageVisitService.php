<?php

declare(strict_types=1);

namespace App\Analytics\Services;

use App\Analytics\DTO\PageVisitDTO;
use App\Analytics\Models\PageVisit;

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
