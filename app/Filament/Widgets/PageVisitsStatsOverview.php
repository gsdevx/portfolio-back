<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Analytics\ChartResolver;
use App\Analytics\PageVisits\PageVisitsAnalytics;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PageVisitsStatsOverview extends BaseWidget
{
    protected PageVisitsAnalytics $analytics;

    public function __construct()
    {
        $this->analytics = new PageVisitsAnalytics;
    }

    protected function getStats(): array
    {
        return [
            $this->uniqueGuestsTodayStat(),
            $this->uniqueGuestsThisWeekStat(),
            $this->uniqueGuestsThisMonthStat(),
        ];
    }

    protected function uniqueGuestsTodayStat(): Stat
    {
        $uniqueGuestsTodayChart = $this->analytics->getHourlyUniqueGuestsTodayChart();
        $uniqueGuestsTodayTrend = ChartResolver::getTrend($uniqueGuestsTodayChart);

        return Stat::make('Посетителей сегодня', $this->analytics->getUniqueGuestsToday())
            ->chart($uniqueGuestsTodayChart)
            ->chartColor($uniqueGuestsTodayTrend->getColor())
            ->icon($uniqueGuestsTodayTrend->getIcon())
            ->description('График по часам');
    }

    protected function uniqueGuestsThisWeekStat(): Stat
    {
        $uniqueGuestsThisWeekChart = $this->analytics->getDailyUniqueGuestsThisWeekChart();
        $uniqueGuestsThisWeekTrend = ChartResolver::getTrend($uniqueGuestsThisWeekChart);

        return Stat::make('Посетителей за неделю', $this->analytics->getUniqueGuestsThisWeek())
            ->chart($uniqueGuestsThisWeekChart)
            ->chartColor($uniqueGuestsThisWeekTrend->getColor())
            ->icon($uniqueGuestsThisWeekTrend->getIcon())
            ->description('График с начала недели по дням');
    }

    protected function uniqueGuestsThisMonthStat(): Stat
    {
        $uniqueGuestsThisMonthChart = $this->analytics->getWeeklyUniqueGuestsThisMonthChart();
        $uniqueGuestsThisMonthTrend = ChartResolver::getTrend($uniqueGuestsThisMonthChart);

        return Stat::make('Посетителей за месяц', $this->analytics->getUniqueGuestsThisMonth())
            ->chart($uniqueGuestsThisMonthChart)
            ->chartColor($uniqueGuestsThisMonthTrend->getColor())
            ->icon($uniqueGuestsThisMonthTrend->getIcon())
            ->description('График с начала месяца по дням');
    }
}
