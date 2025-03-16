<?php

declare(strict_types=1);

namespace App\Report\Mappers;

use App\Notification\DTO\MessageDTO;
use App\Report\DTO\PageVisitsReportDTO;

readonly class PageVisitsReportDTOMapper
{
    public function __construct(
        private PageVisitsReportDTO $pageVisitsReportDTO,
    ) {}

    public function toMessageDTO(): MessageDTO
    {
        $subject = 'Отчет по посещениям страниц, ' . now()->format('d.m.Y');
        $body = PHP_EOL . implode(PHP_EOL, [
            'Уникальных гостей сегодня: ' . $this->pageVisitsReportDTO->uniqueGuestsToday,
            'Просмотров профиля: ' . $this->pageVisitsReportDTO->profilePageVisitsCount,
            'Просмотров страницы кейсов: ' . $this->pageVisitsReportDTO->workCasesPageVisitsCount,
        ]);

        return new MessageDTO($subject, $body);
    }
}
