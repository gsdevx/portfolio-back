<?php

declare(strict_types=1);

namespace App\Portfolio\Repositories;

use App\Portfolio\DTO\ToolDTO;
use App\Portfolio\Models\Tool;
use Illuminate\Support\Collection;

class ToolRepository
{
    protected static string $modelClass = Tool::class;

    /**
     * @return Collection<ToolDTO>
     */
    public function getActiveOrdered(): Collection
    {
        return map_model_collection(self::$modelClass::activeOrdered()->get(), 'toDTO');
    }
}
