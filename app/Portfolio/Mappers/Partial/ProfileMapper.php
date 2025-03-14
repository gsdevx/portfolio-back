<?php

declare(strict_types=1);

namespace App\Portfolio\Mappers\Partial;

use App\Portfolio\DTO\Partial\ProfileDTO;
use App\Settings\AboutMeSettings;

readonly class ProfileMapper
{
    private AboutMeSettings $settings;

    public function __construct(
        private iterable $educationDTOs,
        private iterable $workPlaceDTOs,
        private iterable $toolDTOs,
    ) {
        $this->settings = app(AboutMeSettings::class);
    }

    public function toDTO(): ProfileDTO
    {
        return new ProfileDTO(
            text: $this->settings->text,
            avatarUrl: $this->settings->avatar_url,
            educations: iterator_to_array($this->educationDTOs),
            workPlaces: iterator_to_array($this->workPlaceDTOs),
            tools: iterator_to_array($this->toolDTOs),
        );
    }
}
