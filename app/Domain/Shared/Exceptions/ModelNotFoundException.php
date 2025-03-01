<?php

declare(strict_types=1);

namespace App\Domain\Shared\Exceptions;

class ModelNotFoundException extends \Exception
{
    protected $message = 'The resource you are looking for could not be found';
}
