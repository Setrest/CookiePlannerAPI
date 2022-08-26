<?php

namespace App\Providers\Services;

use App\Domain\Stage\Contracts\Services\StageServiceInterface;
use App\Domain\Stage\Services\StageService;
use Illuminate\Support\ServiceProvider;

class StageServicesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StageServiceInterface::class, StageService::class);
    }
}
