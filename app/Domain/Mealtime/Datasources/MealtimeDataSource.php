<?php

namespace App\Domain\Mealtime\Datasources;

use App\Infrastructure\Datasources\BaseDataSource;
use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\Mealtime;
use App\Models\Schedule;
use DateTime;

class MealtimeDataSource extends BaseDataSource
{
    public function __construct()
    {
        $this->setModel(Mealtime::class);
    }

    public function joinSchedule(): self
    {
        $scheduleTableName = DH::getTableNameByModel(Schedule::class);
        $mealtimeTableName = DH::getTableNameByModel(Mealtime::class);
        $this->source->leftJoin($scheduleTableName, "{$scheduleTableName}.mealtime_id", '=', "{$mealtimeTableName}.id");
        return $this;
    }

    public function byUser(int $userId): self
    {
        $scheduleTableName = DH::getTableNameByModel(Schedule::class);
        $this->source->where("{$scheduleTableName}.user_id", $userId);
        return $this;
    }

    public function byDate(DateTime $date): self
    {
        $scheduleTableName = DH::getTableNameByModel(Schedule::class);
        $this->source->where("{$scheduleTableName}.date", $date);
        return $this;
    }
}
