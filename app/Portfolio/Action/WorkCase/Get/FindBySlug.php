<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase\Get;

use App\Portfolio\Action\WorkCase\Cache\GetOrRememberItem;
use App\Portfolio\Contracts\Repository\WorkCaseRepository;
use App\Portfolio\DTO\WorkCaseDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

readonly class FindBySlug
{
    public function __construct(
        private WorkCaseRepository $workCaseRepository,
        private GetOrRememberItem $getOrRememberItem,
    ) {}

    public function __invoke(string $slug): WorkCaseDTO
    {
        $workCase = $this->getOrRememberItem->__invoke(
            $slug,
            fn (): ?WorkCaseDTO => $this->workCaseRepository->findActiveBySlug($slug)
        );

        if (! $workCase) {
            throw new ModelNotFoundException;
        }

        return $workCase;
    }
}
