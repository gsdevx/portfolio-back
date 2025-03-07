<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        Tool::factory()->count(10)->create();
    }
}
