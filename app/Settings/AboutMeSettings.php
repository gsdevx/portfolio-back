<?php

declare(strict_types=1);

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutMeSettings extends Settings
{
    public ?string $avatar_url;

    public ?string $text;

    public static function group(): string
    {
        return 'aboutMe';
    }
}
