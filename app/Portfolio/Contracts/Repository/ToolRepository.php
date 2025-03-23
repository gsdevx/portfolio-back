<?php

declare(strict_types=1);

namespace App\Portfolio\Contracts\Repository;

use App\Portfolio\DTO\ToolDTO;
use Illuminate\Support\Collection;

interface ToolRepository
{
    /**
     * @return Collection<ToolDTO>
     */
    public function getActiveOrdered(): Collection;
}
