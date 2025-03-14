<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Portfolio\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::factory()->count(1)->create();
    }
}
