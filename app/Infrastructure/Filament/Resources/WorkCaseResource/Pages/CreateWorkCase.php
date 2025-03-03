<?php

declare(strict_types=1);

namespace App\Infrastructure\Filament\Resources\WorkCaseResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use App\Infrastructure\Filament\Resources\WorkCaseResource;

class CreateWorkCase extends CreateRecord
{
    protected static string $resource = WorkCaseResource::class;
}
