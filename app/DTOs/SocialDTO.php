<?php

declare(strict_types=1);

namespace App\DTOs;

readonly class SocialDTO
{
    public function __construct(
        public string $title,
        public string $url,
        public ?string $iconUrl,
    ) {}
}
