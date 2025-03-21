<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase;

use App\Portfolio\Repositories\WorkCaseRepository;
use Illuminate\Contracts\Pagination\Paginator;

readonly class GetPaginatedList
{
    public function __construct(
        private WorkCaseRepository $workCaseRepository
    ) {}

    public function __invoke(int $perPage = 12): Paginator
    {
        return $this->workCaseRepository->getActiveOrderedWithPagination($perPage);
    }
}
