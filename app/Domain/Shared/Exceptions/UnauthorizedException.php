<?php

declare(strict_types=1);

namespace App\Domain\Shared\Exceptions;

class UnauthorizedException extends \Exception
{
    protected $message = 'Unauthorized';
}
