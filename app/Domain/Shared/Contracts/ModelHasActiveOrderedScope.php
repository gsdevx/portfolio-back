<?php

declare(strict_types=1);

namespace App\Domain\Shared\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface ModelHasActiveOrderedScope
{
    public function scopeActiveOrdered(Builder $query): void;
}
