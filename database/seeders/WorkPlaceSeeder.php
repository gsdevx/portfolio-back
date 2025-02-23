<?php

namespace Database\Seeders;

use App\Models\WorkPlace;
use Illuminate\Database\Seeder;

class WorkPlaceSeeder extends Seeder
{
    public function run(): void
    {
        WorkPlace::factory()->count(5)->create();
    }
}
