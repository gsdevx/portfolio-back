<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Portfolio\Models\WorkPlace;
use Illuminate\Database\Seeder;

class WorkPlaceSeeder extends Seeder
{
    public function run(): void
    {
        WorkPlace::factory()->count(5)->create();
    }
}
