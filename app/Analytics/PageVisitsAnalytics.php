<?php

declare(strict_types=1);

namespace App\Analytics;

use App\VisitLog\Contracts\Repository\VisitLogRepository;
use Carbon\Carbon;

readonly class PageVisitsAnalytics
{
    private VisitLogRepository $repository;

    private Carbon $currentDate;

    public function __construct()
    {
        $this->repository = app(VisitLogRepository::class);
        $this->currentDate = now();
    }

    public function getUniqueGuestsToday(): int
    {
        return $this->repository->getUniqueIPAddressesTodayCount();
    }

    public function getUniqueGuestsThisWeek(): int
    {
        return $this->repository->getUniqueIPAddressesThisWeekCount();
    }

    public function getUniqueGuestsThisMonth(): int
    {
        return $this->repository->getUniqueIPAddressesThisMonthCount();
    }

    public function getHourlyUniqueGuestsTodayChart(): array
    {
        $fromDate = $this->currentDate->copy()->startOfDay();
        $hoursBetween = ceil($fromDate->diffInHours($this->currentDate));
        $data = [];

        for ($i = 0; $i < $hoursBetween; $i++) {
            $from = $fromDate->copy()->addHours($i);
            $to = $from->copy()->endOfHour();

            $data[] = $this->repository->getUniqueIPAddressesCount(
                from: $from,
                to: $to
            );
        }

        return $data;
    }

    public function getDailyUniqueGuestsThisWeekChart(): array
    {
        $fromDate = $this->currentDate->copy()->startOfWeek();
        $daysBetween = ceil($fromDate->diffInDays($this->currentDate));
        $data = [];

        for ($i = 0; $i < $daysBetween; $i++) {
            $from = $fromDate->copy()->addDays($i);
            $to = $from->copy()->endOfDay();

            $data[] = $this->repository->getUniqueIPAddressesCount(
                from: $from,
                to: $to
            );
        }

        return $data;
    }

    public function getWeeklyUniqueGuestsThisMonthChart(): array
    {
        $fromDate = $this->currentDate->copy()->startOfMonth();
        $weeksBetween = ceil($fromDate->diffInWeeks($this->currentDate));
        $data = [];

        for ($i = 0; $i < $weeksBetween; $i++) {
            $from = $fromDate->copy()->addWeeks($i);
            $to = $from->copy()->endOfDay();

            $data[] = $this->repository->getUniqueIPAddressesCount(
                from: $from,
                to: $to
            );
        }

        return $data;
    }

    public function getProfilePageVisitsToday(): int
    {
        return $this->repository->getRecordsCountByPathToday('/');
    }

    public function getWorkCasesIndexPageVisitsToday(): int
    {
        return $this->repository->getRecordsCountByPathToday('work-cases');
    }

    public function getWorkCasesShowPageVisitsToday(): int
    {
        return $this->repository->getRecordsCountByPathToday('work-cases/%');
    }
}
