<?php

declare(strict_types=1);

namespace App\Domain\Statistics\ValueObjects;

readonly class UserAgent
{
    public function __construct(
        private string $userAgent
    ) {}

    public static function fromString(string $userAgent): self
    {
        return new self($userAgent);
    }

    public function toString(): string
    {
        return $this->userAgent;
    }
}
