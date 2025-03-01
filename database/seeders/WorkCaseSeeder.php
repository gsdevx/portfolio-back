<?php

namespace Database\Seeders;

use App\Domain\WorkCase\Models\WorkCase;
use Illuminate\Database\Seeder;

class WorkCaseSeeder extends Seeder
{
    public function run(): void
    {
        WorkCase::factory()->count(10)->create();
    }
}
