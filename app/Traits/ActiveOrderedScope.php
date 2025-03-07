<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder activeOrdered()
 * @method Builder activeOrdered()
 */
trait ActiveOrderedScope
{
    public function scopeActiveOrdered(Builder $query): void
    {
        $query->where('is_active', 1)
            ->orderBy('order');
    }
}
