<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\WorkCase;
use Illuminate\Database\Seeder;

class WorkCaseSeeder extends Seeder
{
    public function run(): void
    {
        WorkCase::factory()->count(10)->create();
    }
}
