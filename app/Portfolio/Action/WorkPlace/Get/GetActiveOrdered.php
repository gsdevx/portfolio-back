<?php

declare(strict_types=1);

namespace App\Portfolio\Action\WorkPlace\Get;

use App\Portfolio\Action\WorkPlace\Cache\GetOrRememberItems;
use App\Portfolio\Contracts\Repository\WorkPlaceRepository;
use Illuminate\Support\Collection;

readonly class GetActiveOrdered
{
    public function __construct(
        private WorkPlaceRepository $repository,
        private GetOrRememberItems $getOrRemember,
    ) {}

    public function __invoke(): Collection
    {
        return $this->getOrRemember->__invoke(
            fn (): Collection => $this->repository->getActiveOrdered()
        );
    }
}
