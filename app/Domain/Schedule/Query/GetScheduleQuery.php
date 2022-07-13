<?php

namespace App\Domain\Schedule\Query;

use App\Domain\Schedule\Datasources\ScheduleDataSource;
use App\Models\User;
use DateTime;

class GetScheduleQuery
{
    public function __construct(private ScheduleDataSource $datasource)
    {}

    public function get(User $user, DateTime $fromDate, DateTime $toDate)
    {
        $schedules = $this->datasource
            ->byDateRange($fromDate, $toDate)
            ->byUser($user->id)
            ->with('recipe', 'mealtime')
            ->get();

        return $schedules;
    }
}
