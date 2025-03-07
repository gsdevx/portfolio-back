<?php

declare(strict_types=1);

namespace App\Mappers;

use App\Contracts\Model\ModelMapper;
use App\DTOs\WorkPlaceDTO;
use App\Models\WorkPlace;

readonly class WorkPlaceMapper implements ModelMapper
{
    public function __construct(private WorkPlace $workPlace) {}

    public function toDTO(): WorkPlaceDTO
    {
        return new WorkPlaceDTO(
            companyName: $this->workPlace->company_name,
            jobTitle: $this->workPlace->job_title,
            description: $this->workPlace->description,
            startDate: $this->workPlace->start_date,
            endDate: $this->workPlace->end_date,
        );
    }
}
