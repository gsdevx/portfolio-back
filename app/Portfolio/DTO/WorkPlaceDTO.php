<?php

declare(strict_types=1);

namespace App\Portfolio\DTO;

use Carbon\Carbon;

readonly class WorkPlaceDTO
{
    public function __construct(
        public string $companyName,
        public string $jobTitle,
        public ?string $description,
        public Carbon $startDate,
        public Carbon $endDate,
    ) {}
}
