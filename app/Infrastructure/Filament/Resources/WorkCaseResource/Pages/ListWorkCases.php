<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\WorkCaseResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Infrastructure\Filament\Resources\WorkCaseResource;

class ListWorkCases extends ListRecords
{
    protected static string $resource = WorkCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
