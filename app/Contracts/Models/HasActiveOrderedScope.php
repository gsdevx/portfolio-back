<?php

declare(strict_types=1);

namespace App\Contracts\Models;

use Illuminate\Database\Eloquent\Builder;

interface HasActiveOrderedScope
{
    public function scopeActiveOrdered(Builder $query): void;
}
