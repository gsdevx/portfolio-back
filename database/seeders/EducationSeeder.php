<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\AboutMe\Models\Education;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::factory()->count(1)->create();
    }
}
