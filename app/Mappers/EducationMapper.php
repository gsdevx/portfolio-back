<?php

declare(strict_types=1);

namespace App\Mappers;

use App\Contracts\Model\ModelMapper;
use App\DTOs\EducationDTO;
use App\Models\Education;

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
