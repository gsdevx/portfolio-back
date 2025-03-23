<?php

declare(strict_types=1);

namespace App\Shared\Contracts\Repository;

use App\Portfolio\DTO\SocialDTO;
use Illuminate\Support\Collection;

interface SocialRepository
{
    /**
     * @return Collection<SocialDTO>
     */
    public function getActiveOrdered(): Collection;
}
