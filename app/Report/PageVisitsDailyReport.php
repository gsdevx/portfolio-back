<?php

declare(strict_types=1);

namespace App\Report;

use App\Analytics\PageVisitsAnalytics;
use App\Report\DTO\PageVisitsReportDTO;

readonly class PageVisitsDailyReport
{
    private PageVisitsAnalytics $analytics;

    public function __construct()
    {
        $this->analytics = new PageVisitsAnalytics;
    }

    public function makeReport(): PageVisitsReportDTO
    {
        return new PageVisitsReportDTO(
            uniqueGuestsToday: $this->analytics->getUniqueGuestsToday(),
            profilePageVisitsCount: $this->analytics->getProfilePageVisitsToday(),
            workCasesPageVisitsCount: $this->analytics->getWorkCasesPageVisitsToday()
        );
    }
}
