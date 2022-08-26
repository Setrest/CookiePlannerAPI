<?php

namespace App\Domain\Shared\Exceptions;

use App\Infrastructure\Helpers\ResponseHelper as RH;
use Exception;

class NotFoundException extends Exception
{
    public function render($request)
    {
        return RH::error($this->getMessage(), status:404);
    }
}
