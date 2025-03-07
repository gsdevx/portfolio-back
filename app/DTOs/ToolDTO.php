<?php

declare(strict_types=1);

namespace App\DTOs;

readonly class ToolDTO
{
    public function __construct(
        public string $title,
    ) {}
}
