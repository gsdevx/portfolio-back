<?php

namespace App\Filament\Resources\WorkCaseResource\Pages;

use App\Filament\Resources\WorkCaseResource;
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
}
