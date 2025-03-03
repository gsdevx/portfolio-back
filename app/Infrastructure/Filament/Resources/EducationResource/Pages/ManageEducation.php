<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\EducationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Infrastructure\Filament\Resources\EducationResource;

class ManageEducation extends ManageRecords
{
    protected static string $resource = EducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
