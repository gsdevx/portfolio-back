<?php

declare(strict_types=1);

namespace App\Portfolio\Repositories;

use App\Portfolio\DTO\ContactDTO;
use App\Portfolio\Models\Contact;
use Illuminate\Support\Collection;

class ContactRepository
{
    protected static string $modelClass = Contact::class;

    /**
     * @return Collection<ContactDTO>
     */
    public function getActiveOrdered(): Collection
    {
        return map_model_collection(self::$modelClass::activeOrdered()->get(), 'toDTO');
    }
}
