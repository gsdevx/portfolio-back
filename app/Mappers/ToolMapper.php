<?php

declare(strict_types=1);

namespace App\Mappers;

use App\Contracts\Model\ModelMapper;
use App\DTOs\ToolDTO;
use App\Models\Tool;

readonly class ToolMapper implements ModelMapper
{
    public function __construct(private Tool $tool) {}

    public function toDTO(): ToolDTO
    {
        return new ToolDTO($this->tool->title);
    }
}
