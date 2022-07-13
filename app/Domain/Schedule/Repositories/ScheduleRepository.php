<?php

namespace App\Domain\Schedule\Repositories;

use App\Infrastructure\Helpers\RepositoryPaginationResponse;
use App\Models\Schedule;

class ScheduleRepository
{
    public function getPaginatedForUser(int $userId, int $page = 1, int $perPage = 10): RepositoryPaginationResponse
    {
        $query = Schedule::whereUserId($userId);
        $total = $query->count();
        $data = $query->with('recipe')
            ->offset($page * $perPage - $perPage)
            ->limit($perPage)
            ->get();

        return new RepositoryPaginationResponse($data, $total, $perPage);
    }
}
