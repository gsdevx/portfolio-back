<?php

namespace App\Infrastructure\Filament\Resources\WorkPlaceResource\Pages;

use App\Infrastructure\Filament\Resources\WorkPlaceResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWorkPlaces extends ManageRecords
{
    protected static string $resource = WorkPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
