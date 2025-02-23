<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ContactSeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(WorkPlaceSeeder::class);
    }
}
