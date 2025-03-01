<?php

declare(strict_types=1);

namespace App\Domain\Shared\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property Carbon $start_date
 * @property Carbon $end_date
 */
trait DateSpanAttribute
{
    public function dateSpan(): Attribute
    {
        return Attribute::get(fn(): string => $this->start_date->format('d.m.Y') . ' - ' . $this->end_date->format('d.m.Y'));
    }
}
