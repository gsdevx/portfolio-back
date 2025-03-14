<?php

declare(strict_types=1);

namespace App\Analytics\Http\Request;

use App\Analytics\DTO\PageVisitDTO;
use Illuminate\Http\Request;

readonly class PageVisitRequestMapper
{
    public function __construct(private Request $request) {}

    public function toDTO(): PageVisitDTO
    {
        return new PageVisitDTO(
            ip: $this->request->getClientIp(),
            path: $this->request->path(),
            userAgent: $this->request->userAgent(),
        );
    }
}
