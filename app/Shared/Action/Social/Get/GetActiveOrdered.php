<?php

declare(strict_types=1);

namespace App\Shared\Action\Social\Get;

use App\Shared\Action\Social\Cache\GetOrRememberItems;
use App\Shared\Contracts\Repository\SocialRepository;
use Illuminate\Support\Collection;

readonly class GetActiveOrdered
{
    public function __construct(
        private SocialRepository $repository,
        private GetOrRememberItems $getOrRemember,
    ) {}

    public function __invoke(): Collection
    {
        return $this->getOrRemember->__invoke(
            fn (): Collection => $this->repository->getActiveOrdered()
        );
    }
}
