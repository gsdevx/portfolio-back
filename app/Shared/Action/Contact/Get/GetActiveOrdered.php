<?php

declare(strict_types=1);

namespace App\Shared\Action\Contact\Get;

use App\Shared\Action\Contact\Cache\GetOrRememberItems;
use App\Shared\Contracts\Repository\ContactRepository;
use Illuminate\Support\Collection;

readonly class GetActiveOrdered
{
    public function __construct(
        private ContactRepository $repository,
        private GetOrRememberItems $getOrRemember,
    ) {}

    public function __invoke(): Collection
    {
        return $this->getOrRemember->__invoke(
            fn (): Collection => $this->repository->getActiveOrdered()
        );
    }
}
