<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\ContactResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Infrastructure\Filament\Resources\ContactResource;

class ManageContacts extends ManageRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
