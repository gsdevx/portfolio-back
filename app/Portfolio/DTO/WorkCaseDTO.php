<?php

declare(strict_types=1);

namespace App\Portfolio\DTO;

readonly class WorkCaseDTO
{
    public function __construct(
        public ?int $id,
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
