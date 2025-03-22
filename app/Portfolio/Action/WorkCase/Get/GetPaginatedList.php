<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Get;

use App\Portfolio\Action\WorkCase\Cache\GetOrRememberPaginated;
use App\Portfolio\Repositories\WorkCaseRepository;
use Illuminate\Contracts\Pagination\Paginator;

readonly class GetPaginatedList
{
    public function __construct(
        private WorkCaseRepository $workCaseRepository,
        private GetOrRememberPaginated $getOrRememberPaginated
    ) {}

    public function __invoke(int $page): Paginator
    {
        return $this->getOrRememberPaginated->__invoke(
            $page,
            fn (): Paginator => $this->workCaseRepository->getActiveOrderedWithPagination()
        );
    }
}
