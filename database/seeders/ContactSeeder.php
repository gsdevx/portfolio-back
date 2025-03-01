<?php

namespace Database\Seeders;

use App\Domain\Footer\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::factory()->count(3)->create();
    }
}
