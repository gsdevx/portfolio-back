<?php

declare(strict_types=1);

namespace App\Domain\Statistics\ValueObjects;

readonly class Path
{
    public function __construct(
        private string $path
    ) {}

    public static function fromString(string $path): self
    {
        return new self($path);
    }

    public function toString(): string
    {
        return $this->path;
    }
}
