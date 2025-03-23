<?php

declare(strict_types=1);

namespace App\Portfolio\Contracts\Repository;

use App\Portfolio\DTO\WorkCaseCardDTO;
use App\Portfolio\DTO\WorkCaseDTO;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

interface WorkCaseRepository
{
    public function getActiveOrderedWithPagination(): Paginator;

    public function findActiveBySlug(string $slug): ?WorkCaseDTO;

    /**
     * @return Collection<WorkCaseCardDTO>
     */
    public function findSimilar(WorkCaseDTO $workCase, int $limit = 6): Collection;

    public function getCount(bool $withTrashed = false): int;
}
