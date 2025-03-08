<?php

declare(strict_types=1);

namespace App\DTOs;

readonly class WorkCaseDTO
{
    public function __construct(
        public string $title,
        public string $slug,
        public ?string $previewUrl,
        public ?string $imageUrl,
        public ?string $summary,
        public ?string $description,
        public ?array $tags,
        public ?int $viewsCount,
        public ?int $todayViewsCount,
    ) {}
}
