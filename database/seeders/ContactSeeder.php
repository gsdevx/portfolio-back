<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Portfolio\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::factory()->count(3)->create();
    }
}
