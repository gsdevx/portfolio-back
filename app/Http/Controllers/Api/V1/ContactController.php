<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\Models\Common\GetActiveOrdered;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactController extends Controller
{
    public function index(GetActiveOrdered $activeOrdered): ResourceCollection
    {
        return ContactResource::collection(
            $activeOrdered(Contact::class)
        );
    }
}
