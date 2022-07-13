<?php

namespace App\Providers\Services;

use App\Domain\Schedule\Contracts\ScheduleServiceInterface;
use App\Domain\Schedule\Services\ScheduleService;
use Illuminate\Support\ServiceProvider;

class ScheduleServicesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ScheduleServiceInterface::class, ScheduleService::class);
    }
}
