<?php

declare(strict_types=1);

namespace App\Shared\Contracts\Model;

use Illuminate\Database\Eloquent\Builder;

interface ShouldHaveActiveOrderedScope
{
    public function scopeActiveOrdered(Builder $query): void;
}
