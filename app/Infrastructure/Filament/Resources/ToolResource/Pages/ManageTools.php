<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\ToolResource\Pages;

use App\Infrastructure\Filament\Resources\ToolResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTools extends ManageRecords
{
    protected static string $resource = ToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
