<?php

declare(strict_types=1);

namespace App\Reports\DTO;

readonly class PageVisitsReportDTO
{
    public function __construct(
        public int $uniqueGuestsToday,
        public int $profilePageVisitsCount,
        public int $workCasesPageVisitsCount,
    ) {}
}
