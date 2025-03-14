<?php

declare(strict_types=1);

namespace App\Portfolio\DTO;

readonly class ContactDTO
{
    public function __construct(
        public string $title,
        public string $url,
    ) {}
}
