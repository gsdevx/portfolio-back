<?php

declare(strict_types=1);

namespace App\Analytics;

use App\Portfolio\Models\WorkCase;
use App\VisitLog\Models\VisitLog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class WorkCasesPageVisits
{
    protected const string INDEX_PATH_MASK = 'work-cases';

    protected const string SHOW_PATH_MASK = 'work-cases/:slug';

    public static function getViewsCount(
        ?WorkCase $concrete = null,
        bool $unique = false,
        ?Carbon $fromDate = null,
        ?Carbon $toDate = null
    ): int {
        return VisitLog::query()
            ->when(
                $concrete,
                static fn (Builder $query): Builder => $query->where('path', self::getShowPath($concrete)),
                static fn (Builder $query): Builder => $query->where('path', self::INDEX_PATH_MASK),
            )
            ->when(
                $fromDate,
                static fn (Builder $query): Builder => $query->where('created_at', '>=', $fromDate),
            )
            ->when(
                $toDate,
                static fn (Builder $query): Builder => $query->where('created_at', '<=', $toDate),
            )
            ->when(
                $unique,
                static fn (Builder $query): Builder => $query->select('ip')->distinct(),
            )
            ->count($unique ? 'ip' : '*');
    }

    protected static function getShowPath(WorkCase $workCase): string
    {
        return Str::replace(':slug', $workCase->slug, self::SHOW_PATH_MASK);
    }
}
