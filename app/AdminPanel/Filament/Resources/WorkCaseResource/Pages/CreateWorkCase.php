<?php

declare(strict_types=1);

namespace App\AdminPanel\Filament\Resources\WorkCaseResource\Pages;

use App\AdminPanel\Filament\Resources\WorkCaseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkCase extends CreateRecord
{
    protected static string $resource = WorkCaseResource::class;

    public function getRedirectUrl(): string
    {
        return url(route('filament.admin.resources.work-cases.index'));
    }
}
