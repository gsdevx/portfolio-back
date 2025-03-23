<?php

declare(strict_types=1);

namespace App\Shared\Repositories;

use App\Portfolio\DTO\ContactDTO;
use App\Shared\Contracts\Repository\ContactRepository;
use App\Shared\Models\Contact;
use Illuminate\Support\Collection;

class ContactEloquentRepository implements ContactRepository
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
