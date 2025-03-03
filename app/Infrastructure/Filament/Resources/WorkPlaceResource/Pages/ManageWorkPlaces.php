<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\WorkPlaceResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Infrastructure\Filament\Resources\WorkPlaceResource;

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
