<?php

declare(strict_types=1);

namespace App\Domain\WorkCase\Repositories;

interface WorkCaseRepository
{
    public function findAllActiveOrdered(): \Countable;
}
