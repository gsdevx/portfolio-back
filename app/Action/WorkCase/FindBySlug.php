<?php

declare(strict_types=1);

namespace App\Action\WorkCase;

use App\DTOs\WorkCaseDTO;
use App\Repositories\WorkCaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FindBySlug
{
    public function __construct(
        private WorkCaseRepository $workCaseRepository
    ) {
    }

    public function __invoke(string $slug): WorkCaseDTO
    {
        $workCase = $this->workCaseRepository->findActiveBySlug($slug);

        if (!$workCase) {
            throw new ModelNotFoundException();
        }

        return $workCase->mapper()->toDTO();
    }
}
