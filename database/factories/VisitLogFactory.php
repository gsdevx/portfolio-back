<?php

declare(strict_types=1);

namespace Database\Factories;

use App\VisitLog\Models\VisitLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VisitLog>
 */
class VisitLogFactory extends Factory
{
    protected $model = VisitLog::class;

    public function definition(): array
    {
        return [
            'path' => '/',
            'ip' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
        ];
    }
}
