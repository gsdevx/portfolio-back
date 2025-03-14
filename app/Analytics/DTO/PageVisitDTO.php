<?php

declare(strict_types=1);

namespace App\Analytics\DTO;

readonly class PageVisitDTO
{
    public function __construct(
        public string $ip,
        public string $path,
        public string $userAgent
    ) {}
}
