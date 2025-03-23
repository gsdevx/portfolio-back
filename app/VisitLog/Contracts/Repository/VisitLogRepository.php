<?php

declare(strict_types=1);

namespace App\VisitLog\Contracts\Repository;

use App\VisitLog\DTO\VisitLogDTO;
use Carbon\Carbon;

interface VisitLogRepository
{
    public function create(VisitLogDTO $visitLog): void;

    public function getUniqueIPAddressesTodayCount(?string $path = null): int;

    public function getUniqueIPAddressesThisWeekCount(?string $path = null): int;

    public function getUniqueIPAddressesThisMonthCount(?string $path = null): int;

    public function getUniqueIPAddressesCount(?string $path = null, ?Carbon $from = null, ?Carbon $to = null): int;

    public function getRecordsCountByPathToday(string $path): int;

    public function getRecordsCountByPath(string $path, ?Carbon $from = null, ?Carbon $to = null): int;
}
