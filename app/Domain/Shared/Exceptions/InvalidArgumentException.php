<?php

namespace App\Domain\Shared\Exceptions;

use App\Infrastructure\Helpers\ResponseHelper as RH;
use Exception;

class InvalidArgumentException extends Exception
{
    public function render($request)
    {   
        return RH::error($this->getMessage(), $this->getCode());
    }
}