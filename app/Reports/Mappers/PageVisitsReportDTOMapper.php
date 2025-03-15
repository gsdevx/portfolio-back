<?php

declare(strict_types=1);

namespace App\Reports\Mappers;

use App\Reports\DTO\PageVisitsReportDTO;

readonly class PageVisitsReportDTOMapper
{
    public function __construct(
        private PageVisitsReportDTO $pageVisitsReportDTO,
    ) {}

    public function toHTMLMessageText(): string
    {
        $header = '<b>Отчет по посещениям страниц, ' . now()->format('d.m.Y') . '</b>';
        $body = implode(PHP_EOL, [
            'Уникальных гостей сегодня: ' . $this->pageVisitsReportDTO->uniqueGuestsToday,
            'Просмотров профиля: ' . $this->pageVisitsReportDTO->profilePageVisitsCount,
            'Просмотров страницы кейсов: ' . $this->pageVisitsReportDTO->workCasesPageVisitsCount,
        ]);

        return $header . PHP_EOL . PHP_EOL . $body;
    }
}
