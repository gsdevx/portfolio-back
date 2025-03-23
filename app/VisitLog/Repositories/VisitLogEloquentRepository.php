<?php

declare(strict_types=1);

namespace App\VisitLog\Repositories;

use App\VisitLog\Contracts\Repository\VisitLogRepository;
use App\VisitLog\DTO\VisitLogDTO;
use App\VisitLog\Models\VisitLog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class VisitLogEloquentRepository implements VisitLogRepository
{
    protected static string $modelClass = VisitLog::class;

    public function create(VisitLogDTO $visitLog): void
    {
        self::$modelClass::query()
            ->create([
                'ip' => $visitLog->ip,
                'path' => $visitLog->path,
                'user_agent' => $visitLog->userAgent,
            ]);
    }

    public function getUniqueIPAddressesTodayCount(?string $path = null): int
    {
        $today = today();

        return $this->getUniqueIPAddressesCount(
            path: $path,
            from: $today->copy()->startOfDay(),
            to: $today->copy()->endOfDay()
        );
    }

    public function getUniqueIPAddressesThisWeekCount(?string $path = null): int
    {
        $today = today();

        return $this->getUniqueIPAddressesCount(
            path: $path,
            from: $today->copy()->startOfWeek(),
            to: $today->copy()->endOfWeek()
        );
    }

    public function getUniqueIPAddressesThisMonthCount(?string $path = null): int
    {
        $today = today();

        return $this->getUniqueIPAddressesCount(
            path: $path,
            from: $today->copy()->startOfMonth(),
            to: $today->copy()->endOfMonth()
        );
    }

    public function getUniqueIPAddressesCount(?string $path = null, ?Carbon $from = null, ?Carbon $to = null): int
    {
        return self::$modelClass::query()
            ->select('ip')
            ->when(
                $path,
                static fn (Builder $query): Builder => $query->where('path', $path)
            )
            ->when(
                $from,
                static fn (Builder $query): Builder => $query->where('created_at', '>=', $from),
            )
            ->when(
                $to,
                static fn (Builder $query): Builder => $query->where('created_at', '<=', $to),
            )
            ->distinct()
            ->count('ip');
    }

    public function getRecordsCountByPathToday(string $path): int
    {
        $today = today();

        return $this->getRecordsCountByPath(
            path: $path,
            from: $today->copy()->startOfDay(),
            to: $today->copy()->endOfDay()
        );
    }

    public function getRecordsCountByPath(string $path, ?Carbon $from = null, ?Carbon $to = null): int
    {
        $likeCondition = str($path)->contains('%');

        return self::$modelClass::query()
            ->where('path', $likeCondition ? 'like' : '=', $path)
            ->when(
                $from,
                static fn (Builder $query): Builder => $query->where('created_at', '>=', $from),
            )
            ->when(
                $to,
                static fn (Builder $query): Builder => $query->where('created_at', '<=', $to),
            )
            ->count();
    }
}
