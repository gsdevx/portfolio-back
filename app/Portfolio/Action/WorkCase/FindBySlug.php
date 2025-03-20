<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkCase;

use App\Portfolio\DTO\WorkCaseDTO;
use App\Portfolio\Repositories\WorkCaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

readonly class FindBySlug
{
    public function __construct(
        private WorkCaseRepository $workCaseRepository
    ) {}

    public function __invoke(string $slug): WorkCaseDTO
    {
        $workCase = $this->workCaseRepository->findActiveBySlug($slug);

        if (! $workCase) {
            throw new ModelNotFoundException;
        }

        return $workCase->mapper()->toDTO();
    }
}
