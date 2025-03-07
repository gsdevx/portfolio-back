<?php

declare(strict_types=1);

namespace App\DTOs\Partial;

use Illuminate\Contracts\Support\Arrayable;

readonly class ProfileDTO implements Arrayable
{
    public function __construct(
        public ?string $text,
        public ?string $avatarUrl,
        public array $educations,
        public array $workPlaces,
        public array $tools
    ) {}

    public function toArray()
    {
        return get_object_vars($this);
    }
}
