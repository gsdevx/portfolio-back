<?php

declare(strict_types=1);

namespace App\VisitLog\Providers;

use App\VisitLog\Contracts\Repository\VisitLogRepository;
use App\VisitLog\Repositories\VisitLogEloquentRepository;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public array $bindings = [
        VisitLogRepository::class => VisitLogEloquentRepository::class,
    ];
}
