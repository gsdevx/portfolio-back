<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\EducationResource\Pages;

use App\Infrastructure\Filament\Resources\EducationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

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
