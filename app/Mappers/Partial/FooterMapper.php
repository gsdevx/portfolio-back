<?php

declare(strict_types=1);

namespace App\Mappers\Partial;

use App\DTOs\Partial\FooterDTO;

readonly class FooterMapper
{
    public function __construct(
        private iterable $socialDTOs,
        private iterable $contactDTOs
    ) {}

    public function toDTO(): FooterDTO
    {
        return new FooterDTO(
            socials: iterator_to_array($this->socialDTOs),
            contacts: iterator_to_array($this->contactDTOs),
        );
    }
}
