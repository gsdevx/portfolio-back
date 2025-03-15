<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Portfolio\Models\Contact;
use App\Shared\Traits\DatabaseFactories\ActiveSetter;
use App\Shared\Traits\DatabaseFactories\InactiveSetter;
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
