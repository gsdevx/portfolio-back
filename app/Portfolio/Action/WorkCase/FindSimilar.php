<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase;

use App\Portfolio\DTO\WorkCaseDTO;
use App\Portfolio\Repositories\WorkCaseRepository;
use Illuminate\Support\Collection;

readonly class FindSimilar
{
    public function __construct(
        private WorkCaseRepository $workCaseRepository
    ) {}

    public function __invoke(WorkCaseDTO $workCase): Collection
    {
        return $this->workCaseRepository->findSimilar($workCase);
    }
}
