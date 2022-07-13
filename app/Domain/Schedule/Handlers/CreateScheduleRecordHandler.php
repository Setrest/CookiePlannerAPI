<?php

namespace App\Domain\Schedule\Handlers;

use App\Domain\Schedule\Contracts\ScheduleServiceInterface;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

class CreateScheduleRecordHandler
{
    private ScheduleServiceInterface $scheduleService;

    public function __construct(ScheduleServiceInterface $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    public function handle(User $user, int $recipeId, DateTime $date, int $mealtimeId): Schedule
    {
        return $this->scheduleService->create([
            'user_id' => $user->id,
            'recipe_id' => $recipeId,
            'date' => Carbon::parse($date),
            'mealtime_id' => $mealtimeId
        ]);
    }
}