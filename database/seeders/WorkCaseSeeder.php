<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\WorkCase\Models\WorkCase;

class WorkCaseSeeder extends Seeder
{
    public function run(): void
    {
        WorkCase::factory()->count(10)->create();
    }
}
