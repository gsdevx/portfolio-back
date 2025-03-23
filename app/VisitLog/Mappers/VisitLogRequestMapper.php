<?php

declare(strict_types=1);

namespace App\VisitLog\Mappers;

use App\VisitLog\DTO\VisitLogDTO;
use Illuminate\Http\Request;

readonly class VisitLogRequestMapper
{
    public function __construct(private Request $request) {}

    public function toDTO(): VisitLogDTO
    {
        return new VisitLogDTO(
            ip: $this->request->getClientIp(),
            path: $this->request->path(),
            userAgent: $this->request->userAgent(),
        );
    }
}
