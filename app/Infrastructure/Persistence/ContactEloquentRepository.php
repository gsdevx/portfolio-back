<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Footer\Models\Contact;
use App\Domain\Footer\Repositories\ContactRepositoryWithActiveOrderedRecords;

class ContactEloquentRepository implements ContactRepositoryWithActiveOrderedRecords
{
    public function findAllActiveOrdered(): \Countable
    {
        return Contact::activeOrdered()->get();
    }
}
