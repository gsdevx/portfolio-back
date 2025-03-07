<?php

declare(strict_types=1);

namespace App\Contracts\Model;

interface Mappable
{
    public function mapper(): ModelMapper;
}
