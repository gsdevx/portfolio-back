<?php

declare(strict_types=1);

namespace App\Portfolio\DTO;

class WorkCaseCardDTO
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $slug,
        public ?string $previewUrl,
        public ?string $summary,
        public ?array $tags,
    ) {}
}
