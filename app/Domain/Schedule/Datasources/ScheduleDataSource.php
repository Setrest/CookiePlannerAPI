<?php

namespace App\Domain\Schedule\Datasources;

use App\Infrastructure\Datasources\BaseDataSource;
use App\Models\Schedule;
use DateTime;

class ScheduleDataSource extends BaseDataSource
{
    public function __construct()
    {
        $this->setModel(Schedule::class);
    }

    public function byUser(int $userId)
    {
        $this->source->where('user_id', $userId);
        return $this;
    }

    public function byDateRange(DateTime $from, DateTime $to)
    {
        $this->source->where('date', '>=', $from)
            ->where('date', '<=', $to);
        return $this;
    }
}
