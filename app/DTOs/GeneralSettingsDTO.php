<?php

declare(strict_types=1);

namespace App\DTOs;

readonly class GeneralSettingsDTO
{
    public function __construct(
        public bool $siteEnabled
    ) {}
}
