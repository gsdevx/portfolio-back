<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Footer\Models\Contact;
use Database\Factories\Traits\ActiveSetter;
use Database\Factories\Traits\InactiveSetter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    use ActiveSetter;
    use InactiveSetter;

    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'title' => $this->faker->word(),
            'url' => $this->faker->url(),
            'order' => $this->faker->randomDigit(),
        ];
    }
}
