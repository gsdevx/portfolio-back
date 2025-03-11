<?php

declare(strict_types=1);

namespace App\Enums;

enum ChartTrend
{
    case POSITIVE;

    case NEGATIVE;

    case PLATO;

    case NOT_ENOUGH_DATA;

    public function getColor(): string
    {
        return match ($this) {
            self::POSITIVE => 'success',
            self::NEGATIVE => 'danger',
            self::PLATO => 'warning',
            self::NOT_ENOUGH_DATA => 'secondary',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::POSITIVE => 'heroicon-m-arrow-trending-up',
            self::NEGATIVE => 'heroicon-m-arrow-trending-down',
            self::PLATO => 'heroicon-m-arrow-long-right',
            self::NOT_ENOUGH_DATA => 'heroicon-clock',
        };
    }
}
