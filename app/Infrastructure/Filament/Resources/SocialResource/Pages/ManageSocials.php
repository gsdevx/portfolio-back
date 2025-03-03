<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\SocialResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Infrastructure\Filament\Resources\SocialResource;

class ManageSocials extends ManageRecords
{
    protected static string $resource = SocialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
