<?php

declare(strict_types=1);

namespace App\Notification\DTO;

readonly class MessageDTO
{
    public function __construct(
        public string $subject,
        public string $body,
    ) {}
}
