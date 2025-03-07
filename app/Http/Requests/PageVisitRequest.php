<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageVisitRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'path' => ['required', 'string'],
            'userAgent' => ['required', 'string'],
        ];
    }
}
