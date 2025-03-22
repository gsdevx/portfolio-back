<?php

declare(strict_types=1);

namespace App\Portfolio\Action\Tool\Get;

use App\Portfolio\Action\Tool\Cache\GetOrRememberItems;
use App\Portfolio\Repositories\ToolRepository;
use Illuminate\Support\Collection;

readonly class GetActiveOrdered
{
    public function __construct(
        private ToolRepository $repository,
        private GetOrRememberItems $getOrRemember,
    ) {}

    public function __invoke(): Collection
    {
        return $this->getOrRemember->__invoke(
            fn (): Collection => $this->repository->getActiveOrdered()
        );
    }
}
