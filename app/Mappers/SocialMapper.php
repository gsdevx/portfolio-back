<?php

declare(strict_types=1);

namespace App\Mappers;

use App\Contracts\Model\ModelMapper;
use App\DTOs\SocialDTO;
use App\Models\Social;

readonly class SocialMapper implements ModelMapper
{
    public function __construct(private Social $social) {}

    public function toDTO(): SocialDTO
    {
        return new SocialDTO(
            title: $this->social->title,
            url: $this->social->url,
            iconUrl: $this->social->getFirstMediaUrl('icons')
        );
    }
}
