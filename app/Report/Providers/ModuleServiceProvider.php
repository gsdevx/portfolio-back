<?php

declare(strict_types=1);

namespace App\Report\Providers;

use App\Report\Console\Commands\SendPageVisitsDailyReport;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    private array $commands = [
        SendPageVisitsDailyReport::class,
    ];

    public function register(): void
    {
        $this->registerCommands();
    }

    private function registerCommands(): void
    {
        $this->commands($this->commands);
    }
}
