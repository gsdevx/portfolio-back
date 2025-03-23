<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Get;

use App\Portfolio\Action\WorkCase\Cache\GetOrRememberSimilarItems;
use App\Portfolio\Contracts\Repository\WorkCaseRepository;
use App\Portfolio\DTO\WorkCaseDTO;
use Illuminate\Support\Collection;

readonly class FindSimilar
{
    public function __construct(
        private WorkCaseRepository $workCaseRepository,
        private GetOrRememberSimilarItems $getOrRememberSimilarItems,
    ) {}

    public function __invoke(WorkCaseDTO $workCase): Collection
    {
        return $this->getOrRememberSimilarItems->__invoke(
            $workCase->slug,
            fn (): Collection => $this->workCaseRepository->findSimilar($workCase)
        );
    }
}
