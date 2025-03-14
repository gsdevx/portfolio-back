<?php

declare(strict_types=1);

namespace App\Portfolio\Mappers;

use App\Portfolio\DTO\EducationDTO;
use App\Portfolio\Models\Education;
use App\Shared\Contracts\Model\ModelMapper;

readonly class EducationMapper implements ModelMapper
{
    public function __construct(private Education $education) {}

    public function toDTO(): EducationDTO
    {
        return new EducationDTO(
            institutionName: $this->education->institution_name,
            profession: $this->education->profession,
            description: $this->education->description,
            startDate: $this->education->start_date,
            endDate: $this->education->end_date,
        );
    }
}
