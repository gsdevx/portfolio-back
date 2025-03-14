<?php

declare(strict_types=1);

namespace App\Portfolio\Mappers;

use App\Portfolio\DTO\ContactDTO;
use App\Portfolio\Models\Contact;
use App\Shared\Contracts\Model\ModelMapper;

readonly class ContactMapper implements ModelMapper
{
    public function __construct(private Contact $contact) {}

    public function toDTO(): ContactDTO
    {
        return new ContactDTO(
            title: $this->contact->title,
            url: $this->contact->url,
        );
    }
}
