<?php

declare(strict_types=1);

namespace App\Portfolio\Mappers;

use App\Portfolio\DTO\SocialDTO;
use App\Shared\Contracts\Model\ModelMapper;
use App\Shared\Models\Social;

readonly class SocialMapper implements ModelMapper
{
    public function __construct(private Social $social) {}

    public function toDTO(): SocialDTO
    {
        return new SocialDTO(
            id: $this->social->id,
            title: $this->social->title,
            url: $this->social->url,
            iconUrl: $this->social->getFirstMediaUrl('icons')
        );
    }
}
