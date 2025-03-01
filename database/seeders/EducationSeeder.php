<?php

namespace Database\Seeders;

use App\Domain\AboutMe\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::factory()->count(1)->create();
    }
}
