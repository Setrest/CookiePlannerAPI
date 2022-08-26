<?php

namespace App\Domain\Stage\Services;

use App\Domain\Stage\Contracts\Services\StageServiceInterface;
use App\Models\Stage;

class StageService implements StageServiceInterface
{
    public function create(array $data): Stage
    {
        return Stage::create($data);
    }
}
