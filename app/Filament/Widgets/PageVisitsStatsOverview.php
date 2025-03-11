<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Analytics\PageVisits\PageVisitsAnalytics;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PageVisitsStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $uniqueGuestsTodayChart = PageVisitsAnalytics::getUniqueGuestsTodayChart();
        $uniqueGuestsThisWeekChart = PageVisitsAnalytics::getUniqueGuestsThisWeekChart();
        $uniqueGuestsThisMonthChart = PageVisitsAnalytics::getUniqueGuestsThisMonthChart();

        return [
            Stat::make('Посетителей сегодня', PageVisitsAnalytics::getUniqueGuestsToday())
                ->chart($uniqueGuestsTodayChart)
                ->color(PageVisitsAnalytics::getChartColor($uniqueGuestsTodayChart))
                ->description('График по часам'),
            Stat::make('Посетителей за неделю', PageVisitsAnalytics::getUniqueGuestsThisWeek())
                ->chart($uniqueGuestsThisWeekChart)
                ->color(PageVisitsAnalytics::getChartColor($uniqueGuestsThisWeekChart))
                ->description('График с начала недели по дням'),
            Stat::make('Посетителей за месяц', PageVisitsAnalytics::getUniqueGuestsThisMonth())
                ->chart($uniqueGuestsThisMonthChart)
                ->color(PageVisitsAnalytics::getChartColor($uniqueGuestsThisMonthChart))
                ->description('График с начала месяца по дням'),
            Stat::make('Просмотров профиля сегодня', PageVisitsAnalytics::getProfilePageViewsToday()),
            Stat::make('Просмотров профиля за неделю', PageVisitsAnalytics::getProfilePageViewsThisWeek()),
            Stat::make('Просмотров профиля за месяц', PageVisitsAnalytics::getProfilePageViewsThisMonth()),
        ];
    }
}
