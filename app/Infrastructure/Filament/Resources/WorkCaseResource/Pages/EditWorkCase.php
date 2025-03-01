<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\WorkCaseResource\Pages;

use App\Infrastructure\Filament\Resources\WorkCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorkCase extends EditRecord
{
    protected static string $resource = WorkCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
