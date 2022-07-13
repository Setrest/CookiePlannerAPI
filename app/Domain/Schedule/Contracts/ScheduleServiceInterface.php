<?php

namespace App\Domain\Schedule\Contracts;

use App\Models\Schedule;

interface ScheduleServiceInterface 
{
    public function create(array $attributes): Schedule;
}