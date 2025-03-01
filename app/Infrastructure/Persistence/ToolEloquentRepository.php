<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\AboutMe\Models\Tool;
use App\Domain\AboutMe\Repositories\ToolRepositoryWithActiveOrderedRecords;

class ToolEloquentRepository implements ToolRepositoryWithActiveOrderedRecords
{
    public function findAllActiveOrdered(): \Countable
    {
        return Tool::activeOrdered()->get();
    }
}
