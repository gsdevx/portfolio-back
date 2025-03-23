<?php

declare(strict_types=1);

namespace App\Portfolio\Contracts\Repository;

use App\Portfolio\DTO\WorkPlaceDTO;
use Illuminate\Support\Collection;

interface WorkPlaceRepository
{
    /**
     * @return Collection<WorkPlaceDTO>
     */
    public function getActiveOrdered(): Collection;
}
