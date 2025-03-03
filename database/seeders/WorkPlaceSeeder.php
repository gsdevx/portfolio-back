<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\AboutMe\Models\WorkPlace;

class WorkPlaceSeeder extends Seeder
{
    public function run(): void
    {
        WorkPlace::factory()->count(5)->create();
    }
}
