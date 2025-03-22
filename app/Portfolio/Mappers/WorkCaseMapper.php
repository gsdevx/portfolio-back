<?php

declare(strict_types=1);

namespace App\Portfolio\Mappers;

use App\Portfolio\DTO\WorkCaseCardDTO;
use App\Portfolio\DTO\WorkCaseDTO;
use App\Portfolio\Models\WorkCase;
use App\Shared\Contracts\Model\ModelMapper;

readonly class WorkCaseMapper implements ModelMapper
{
    public function __construct(private WorkCase $workCase) {}

    public function toDTO(): WorkCaseDTO
    {
        return new WorkCaseDTO(
            id: $this->workCase->id,
            title: $this->workCase->title,
            slug: $this->workCase->slug,
            imageUrl: $this->workCase->getFirstMediaUrl('images'),
            videoUrl: $this->workCase->getFirstMediaUrl('videos'),
            description: $this->workCase->description,
            tags: $this->workCase->tags,
        );
    }

    public function toCardDTO(): WorkCaseCardDTO
    {
        return new WorkCaseCardDTO(
            id: $this->workCase->id,
            title: $this->workCase->title,
            slug: $this->workCase->slug,
            previewUrl: $this->workCase->getFirstMediaUrl('previews', 'preview-thumb'),
            summary: $this->workCase->summary,
            tags: $this->workCase->tags,
        );
    }
}
