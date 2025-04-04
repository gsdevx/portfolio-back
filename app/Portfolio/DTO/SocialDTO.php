<?php

declare(strict_types=1);

namespace App\Portfolio\DTO;

readonly class SocialDTO
{
    public function __construct(
        public int $id,
        public string $title,
        public string $url,
        public ?string $iconUrl,
    ) {}
}
