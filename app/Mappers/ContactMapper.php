<?php

declare(strict_types=1);

namespace App\Mappers;

use App\Contracts\Model\ModelMapper;
use App\DTOs\ContactDTO;
use App\Models\Contact;

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
