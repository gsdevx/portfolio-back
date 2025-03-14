<?php

declare(strict_types=1);

namespace App\Portfolio\Mappers;

use App\Portfolio\DTO\ToolDTO;
use App\Portfolio\Models\Tool;
use App\Shared\Contracts\Model\ModelMapper;

readonly class ToolMapper implements ModelMapper
{
    public function __construct(private Tool $tool) {}

    public function toDTO(): ToolDTO
    {
        return new ToolDTO($this->tool->title);
    }
}
