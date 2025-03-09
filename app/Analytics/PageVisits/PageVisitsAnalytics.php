<?php

declare(strict_types=1);

namespace App\Analytics\PageVisits;

use App\Models\PageVisit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class PageVisitsAnalytics
{
    public static function getUniqueGuestsToday(): int
    {
        $today = today();

        return self::getVisitsCount(
            fromDate: $today->copy()->startOfDay(),
            toDate: $today->copy()->endOfDay()
        );
    }

    public static function getUniqueGuestsThisWeek(): int
    {
        $today = today();

        return self::getVisitsCount(
            fromDate: $today->copy()->startOfWeek(),
            toDate: $today->copy()->endOfWeek()
        );
    }

    public static function getUniqueGuestsThisMonth(): int
    {
        $today = today();

        return self::getVisitsCount(
            fromDate: $today->copy()->startOfMonth(),
            toDate: $today->copy()->endOfMonth()
        );
    }

    public static function getProfilePageViewsToday(): int
    {
        $today = today();

        return ProfilePageVisits::getViewsCount(
            fromDate: $today->copy()->startOfDay(),
            toDate: $today->copy()->endOfDay(),
        );
    }

    public static function getProfilePageViewsThisWeek(): int
    {
        $today = today();

        return ProfilePageVisits::getViewsCount(
            fromDate: $today->copy()->startOfWeek(),
            toDate: $today->copy()->endOfWeek(),
        );
    }

    public static function getProfilePageViewsThisMonth(): int
    {
        $today = today();

        return ProfilePageVisits::getViewsCount(
            fromDate: $today->copy()->startOfMonth(),
            toDate: $today->copy()->endOfMonth(),
        );
    }

    public static function getVisitsCount(bool $unique = true, ?Carbon $fromDate = null, ?Carbon $toDate = null): int
    {
        return PageVisit::query()
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

    public static function getUniqueGuestsTodayChart(): array
    {
        $fromDate = today()->startOfDay();
        $toDate = now();
        $hoursBetween = ceil($fromDate->diffInHours($toDate));
        $data = [];

        for ($i = 0; $i < $hoursBetween; $i++) {
            $currentHourStart = $fromDate->copy()->addHours($i);
            $currentHourEnd = $currentHourStart->copy()->endOfHour();

            $count = PageVisit::query()
                ->where('created_at', '>=', $currentHourStart)
                ->where('created_at', '<=', $currentHourEnd)
                ->distinct()
                ->count('ip');

            $data[] = $count;
        }

        return $data;
    }

    public static function getUniqueGuestsThisWeekChart(): array
    {
        $fromDate = today()->startOfWeek();
        $toDate = today();
        $daysBetween = ceil($fromDate->diffInDays($toDate));
        $data = [];

        for ($i = 0; $i < $daysBetween; $i++) {
            $currentDateStart = $fromDate->copy()->addDays($i);
            $currentDateEnd = $currentDateStart->copy()->endOfDay();

            $count = PageVisit::query()
                ->where('created_at', '>=', $currentDateStart)
                ->where('created_at', '<=', $currentDateEnd)
                ->distinct()
                ->count('ip');

            $data[] = $count;
        }

        return $data;
    }

    public static function getUniqueGuestsThisMonthChart(): array
    {
        $fromDate = today()->startOfMonth();
        $toDate = today();
        $daysBetween = ceil($fromDate->diffInDays($toDate));
        $data = [];

        for ($i = 0; $i < $daysBetween; $i++) {
            $currentDateStart = $fromDate->copy()->addDays($i);
            $currentDateEnd = $currentDateStart->copy()->endOfDay();

            $count = PageVisit::query()
                ->where('created_at', '>=', $currentDateStart)
                ->where('created_at', '<=', $currentDateEnd)
                ->distinct()
                ->count('ip');

            $data[] = $count;
        }

        return $data;
    }

    public static function getChartColor(array $chart): string
    {
        if (empty($chart)) {
            return 'danger';
        }

        if (count($chart) === 1) {
            return 'warning';
        }

        $first = $chart[0];
        $last = $chart[count($chart) - 1];

        if ($first > $last) {
            return 'danger';
        }

        if ($first === $last) {
            return 'danger';
        }

        return 'success';
    }
}
