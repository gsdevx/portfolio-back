<?php

declare(strict_types=1);

namespace App\Portfolio\Providers;

use App\Portfolio\Console\Commands\ConvertWorkCasesPreviewImagesToWebp;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    private array $commands = [
        ConvertWorkCasesPreviewImagesToWebp::class,
    ];

    public function register(): void
    {
        $this->registerConsoleCommands();
    }

    private function registerConsoleCommands(): void
    {
        $this->commands($this->commands);
    }
}
