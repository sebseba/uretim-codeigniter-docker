<?php

namespace App\Business\Exceptions;

use RuntimeException;
use Throwable;

class UserExceptions extends RuntimeException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function userAlreadyExistsException(string $message = "Bu kullanıcı zaten kayıtlıdır.", int $code = 0, Throwable $previous = null)
    {
        return new static($message, $code, $previous);
    }
}
