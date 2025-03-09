<?php

declare(strict_types=1);

namespace App\Analytics\PageVisits;

use App\Models\PageVisit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ProfilePageVisits
{
    protected const string PATH = '/';

    public static function getViewsCount(
        bool $unique = false,
        ?Carbon $fromDate = null,
        ?Carbon $toDate = null
    ): int {
        return PageVisit::query()
            ->where('path', self::PATH)
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
}
