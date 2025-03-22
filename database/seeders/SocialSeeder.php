<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Shared\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    public function run(): void
    {
        Social::factory()->count(3)->create();
    }
}
