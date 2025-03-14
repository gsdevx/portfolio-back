<?php

declare(strict_types=1);

namespace App\Settings\DTO;

readonly class GeneralSettingsDTO
{
    public function __construct(
        public bool $siteEnabled
    ) {}
}
