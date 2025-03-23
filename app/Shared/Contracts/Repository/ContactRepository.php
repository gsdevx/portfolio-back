<?php

declare(strict_types=1);

namespace App\Shared\Contracts\Repository;

use App\Portfolio\DTO\ContactDTO;
use Illuminate\Support\Collection;

interface ContactRepository
{
    /**
     * @return Collection<ContactDTO>
     */
    public function getActiveOrdered(): Collection;
}
