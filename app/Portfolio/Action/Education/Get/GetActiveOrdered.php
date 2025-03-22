<?php

declare(strict_types=1);

namespace App\Portfolio\Action\Education\Get;

use App\Portfolio\Action\Education\Cache\GetOrRememberItems;
use App\Portfolio\Repositories\EducationRepository;
use Illuminate\Support\Collection;

readonly class GetActiveOrdered
{
    public function __construct(
        private EducationRepository $repository,
        private GetOrRememberItems $getOrRemember,
    ) {}

    public function __invoke(): Collection
    {
        return $this->getOrRemember->__invoke(
            fn (): Collection => $this->repository->getActiveOrdered()
        );
    }
}
