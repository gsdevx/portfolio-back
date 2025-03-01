<?php

namespace Database\Seeders;

use App\Domain\AboutMe\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        Tool::factory()->count(10)->create();
    }
}
