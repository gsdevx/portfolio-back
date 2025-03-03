<?php

declare(strict_types=1);

namespace App\Infrastructure\Actions\PageVisit;

use App\Domain\Statistics\ValueObjects\IP;
use App\Domain\Statistics\Models\PageVisit;
use App\Domain\Statistics\ValueObjects\Path;
use App\Domain\Statistics\ValueObjects\UserAgent;
use App\Infrastructure\Http\Requests\PageVisitRequest;
use App\Domain\Statistics\Repositories\PageVisitRepository;

readonly class CreateFromRequestAction
{
    public function __construct(
        private PageVisitRepository $repository
    ) {}

    public function __invoke(PageVisitRequest $request): PageVisit
    {
        $ip = IP::fromString($request->ip());
        $path = Path::fromString($request->validated('path'));
        $userAgent = UserAgent::fromString($request->validated('userAgent'));

        return $this->repository->persist($ip, $path, $userAgent);
    }
}
