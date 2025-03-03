<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Footer\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::factory()->count(3)->create();
    }
}
