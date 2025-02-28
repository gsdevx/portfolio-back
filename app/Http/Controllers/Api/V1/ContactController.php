<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactController extends ApiController
{
    public function index(GetActiveOrdered $activeOrdered): ResourceCollection
    {
        return $this->resourceCollection(ContactResource::class, $activeOrdered(Contact::class));
    }
}
