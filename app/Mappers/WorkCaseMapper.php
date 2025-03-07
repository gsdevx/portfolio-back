<?php

declare(strict_types=1);

namespace App\Mappers;

use App\Contracts\Model\ModelMapper;
use App\DTOs\WorkCaseDTO;
use App\Models\WorkCase;

readonly class WorkCaseMapper implements ModelMapper
{
    public function __construct(private WorkCase $workCase) {}

    public function toDTO(): WorkCaseDTO
    {
        return new WorkCaseDTO(
            title: $this->workCase->title,
            slug: $this->workCase->slug,
            previewUrl: $this->workCase->getFirstMediaUrl('previews'),
            imageUrl: $this->workCase->getFirstMediaUrl('images'),
            summary: $this->workCase->summary,
            description: $this->workCase->description,
            tags: $this->workCase->tags,
        );
    }
}
