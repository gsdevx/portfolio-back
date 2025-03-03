<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Statistics\Models\PageVisit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PageVisit>
 */
class PageVisitFactory extends Factory
{
    protected $model = PageVisit::class;

    public function definition(): array
    {
        return [
            'path' => '/cases',
            'ip' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
        ];
    }
}
