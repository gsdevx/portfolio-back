<?php

declare(strict_types=1);

namespace App\Domain\Shared\Repositories;

use Countable;

interface RepositoryWithActiveOrderedRecords
{
    public function findAllActiveOrdered(): Countable;
}
