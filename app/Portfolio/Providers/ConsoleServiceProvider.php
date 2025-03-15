<?php

declare(strict_types=1);

namespace App\Portfolio\Providers;

use App\Portfolio\Console\Commands\ConvertWorkCasesPreviewImagesToWebp;
use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->commands([
            ConvertWorkCasesPreviewImagesToWebp::class,
        ]);
    }
}
