<?php

declare(strict_types=1);

namespace App\Actions\Models\Common;

use App\Contracts\Models\HasActiveOrderedScope;
use Illuminate\Database\Eloquent\Collection;

class GetActiveOrdered
{
    public function __invoke(string $modelClass): Collection
    {
        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException(sprintf('Class %s does not exist', $modelClass));
        }

        if (!is_subclass_of($modelClass, HasActiveOrderedScope::class)) {
            throw new \InvalidArgumentException(sprintf('Model class "%s" must implement "%s".', $modelClass, HasActiveOrderedScope::class));
        }

        return $modelClass::activeOrdered()->get();
    }
}
