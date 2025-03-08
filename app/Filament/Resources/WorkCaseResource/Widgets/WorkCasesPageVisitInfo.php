<?php

declare(strict_types=1);

namespace App\Filament\Resources\WorkCaseResource\Widgets;

use App\Analytics\PageVisits\WorkCasesPageVisits;
use Filament\Widgets\Widget;

class WorkCasesPageVisitInfo extends Widget
{
    protected static string $view = 'filament.resources.work-case-resource.widgets.work-cases-page-visit-info';

    protected int|string|array $columnSpan = 'full';

    protected function getViewData(): array
    {
        $today = today();
        $startOfDay = $today->clone()->startOfDay();
        $endOfDay = $today->clone()->endOfDay();

        return [
            'allViewsToday' => WorkCasesPageVisits::getViewsCount(fromDate: $startOfDay, toDate: $endOfDay),
            'uniqueViewsToday' => WorkCasesPageVisits::getViewsCount(unique: true, fromDate: $startOfDay, toDate: $endOfDay),
            'allViews' => WorkCasesPageVisits::getViewsCount(),
            'allUniqueViews' => WorkCasesPageVisits::getViewsCount(unique: true),
        ];
    }
}
