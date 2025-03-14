<?php

declare(strict_types=1);

namespace App\Portfolio\DTO\Partial;

use Illuminate\Contracts\Support\Arrayable;

readonly class FooterDTO implements Arrayable
{
    public function __construct(
        public array $socials,
        public array $contacts
    ) {}

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
