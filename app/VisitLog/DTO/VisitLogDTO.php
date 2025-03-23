<?php

declare(strict_types=1);

namespace App\VisitLog\DTO;

readonly class VisitLogDTO
{
    public function __construct(
        public string $ip,
        public string $path,
        public string $userAgent
    ) {}
}
