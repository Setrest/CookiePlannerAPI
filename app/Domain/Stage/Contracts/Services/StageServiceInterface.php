<?php

namespace App\Domain\Stage\Contracts\Services;

use App\Models\Stage;

interface StageServiceInterface
{
    public function create(array $data): Stage;
}
