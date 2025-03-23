<?php

declare(strict_types=1);

namespace App\VisitLog\Action;

use App\VisitLog\Contracts\Repository\VisitLogRepository;
use App\VisitLog\DTO\VisitLogDTO;

readonly class MakeLog
{
    public function __construct(private VisitLogRepository $repository) {}

    public function __invoke(VisitLogDTO $dto): void
    {
        $this->repository->create($dto);
    }
}
