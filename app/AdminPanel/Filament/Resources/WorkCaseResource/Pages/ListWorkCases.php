<?php

declare(strict_types=1);

namespace App\AdminPanel\Filament\Resources\WorkCaseResource\Pages;

use App\AdminPanel\Filament\Resources\WorkCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorkCases extends ListRecords
{
    protected static string $resource = WorkCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //
        ];
    }
}
