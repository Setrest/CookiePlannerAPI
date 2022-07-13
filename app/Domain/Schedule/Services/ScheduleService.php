<?php

namespace App\Domain\Schedule\Services;

use App\Domain\Schedule\Contracts\ScheduleServiceInterface;
use App\Models\Schedule;

class ScheduleService implements ScheduleServiceInterface
{
    public function create(array $attributes): Schedule
    {
        return Schedule::create($attributes);
    }
}