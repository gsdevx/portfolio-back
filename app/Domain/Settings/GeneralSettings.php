<?php

declare(strict_types=1);

namespace App\Domain\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?string $site_enabled;

    public static function group(): string
    {
        return 'general';
    }
}
