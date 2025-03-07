<?php

declare(strict_types=1);

namespace App\DTOs;

use Carbon\Carbon;

readonly class EducationDTO
{
    public function __construct(
        public string $institutionName,
        public string $profession,
        public ?string $description,
        public Carbon $startDate,
        public Carbon $endDate,
    ) {}
}
