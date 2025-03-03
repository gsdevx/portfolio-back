<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\AboutMe\Models\Tool;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        Tool::factory()->count(10)->create();
    }
}
