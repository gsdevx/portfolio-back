<?php

declare(strict_types=1);

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?bool $site_enabled;

    public static function group(): string
    {
        return 'general';
    }
}
