<?php

declare(strict_types=1);

namespace App\AdminPanel\Filament\Resources\SocialResource\Pages;

use App\AdminPanel\Filament\Resources\SocialResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

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
