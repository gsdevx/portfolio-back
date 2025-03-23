<?php

declare(strict_types=1);

namespace App\Portfolio\Contracts\Repository;

use App\Portfolio\DTO\EducationDTO;
use Illuminate\Support\Collection;

interface EducationRepository
{
    /**
     * @return Collection<EducationDTO>
     */
    public function getActiveOrdered(): Collection;
}
