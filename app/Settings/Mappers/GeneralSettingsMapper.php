<?php

declare(strict_types=1);

namespace App\Settings\Mappers;

use App\Settings\DTO\GeneralSettingsDTO;
use App\Settings\GeneralSettings;

readonly class GeneralSettingsMapper
{
    public function __construct(private GeneralSettings $settings) {}

    public static function makeFromAppContainer(): self
    {
        return new self(app(GeneralSettings::class));
    }

    public function toDTO(): GeneralSettingsDTO
    {
        return new GeneralSettingsDTO(
            siteEnabled: $this->settings->site_enabled
        );
    }
}
