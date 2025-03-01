<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\WorkCase\Models\WorkCase;
use App\Domain\WorkCase\Repositories\WorkCaseRepository;

class WorkCaseEloquentRepository implements WorkCaseRepository
{
    public function findAllActiveOrdered(): \Countable
    {
        return WorkCase::activeOrdered()->get();
    }
}
