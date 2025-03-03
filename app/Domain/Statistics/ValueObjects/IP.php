<?php

declare(strict_types=1);

namespace App\Domain\Statistics\ValueObjects;

readonly class IP
{
    public function __construct(
        private string $ip
    ) {}

    public static function fromString(string $ip): self
    {
        return new self($ip);
    }

    public function toString(): string
    {
        return $this->ip;
    }
}
