<?php

declare(strict_types=1);

namespace App\Analytics;

use App\Enums\ChartTrend;

class ChartResolver
{
    public static function getTrend(array $set): ChartTrend
    {
        if (count($set) < 2) {
            return ChartTrend::NOT_ENOUGH_DATA;
        }

        $lastValue = end($set);
        $previousValue = $set[count($set) - 2];

        if ($lastValue > $previousValue) {
            return ChartTrend::POSITIVE;
        } elseif ($lastValue < $previousValue) {
            return ChartTrend::NEGATIVE;
        } else {
            return ChartTrend::PLATO;
        }
    }
}
