<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Footer\Models\Social;
use App\Domain\Footer\Repositories\SocialRepositoryWithActiveOrderedRecords;

class SocialEloquentRepository implements SocialRepositoryWithActiveOrderedRecords
{
    public function findAllActiveOrdered(): \Countable
    {
        return Social::activeOrdered()->get();
    }
}
