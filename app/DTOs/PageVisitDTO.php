<?php

declare(strict_types=1);

namespace App\DTOs;

readonly class PageVisitDTO
{
    public function __construct(
        public string $ip,
        public string $path,
        public string $userAgent
    ) {}
}
