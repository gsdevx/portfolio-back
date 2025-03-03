<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Footer\Models\Social;

class SocialSeeder extends Seeder
{
    public function run(): void
    {
        Social::factory()->count(3)->create();
    }
}
