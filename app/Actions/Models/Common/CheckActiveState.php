<?php

declare(strict_types=1);

namespace App\Actions\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CheckActiveState
{
    public function __invoke(Model $model): void
    {
        if (!$model->hasAttribute('is_active')) {
            throw new \InvalidArgumentException(sprintf("Model '%s' does not have is_active property.", $model::class));
        }

        if (!$model->getAttribute('is_active')) {
            throw new ModelNotFoundException();
        }
    }
}
