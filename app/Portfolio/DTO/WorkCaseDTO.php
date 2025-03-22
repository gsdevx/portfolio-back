<?php

declare(strict_types=1);

namespace App\Portfolio\DTO;

readonly class WorkCaseDTO
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $slug,
        public ?string $imageUrl,
        public ?string $videoUrl,
        public ?string $description,
        public ?array $tags,
    ) {}
}
