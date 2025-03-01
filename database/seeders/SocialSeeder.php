<?php

namespace Database\Seeders;

use App\Domain\Footer\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    public function run(): void
    {
        Social::factory()->count(3)->create();
    }
}
