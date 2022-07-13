<?php

namespace App\Domain\Recipe\Repositories;

use App\Infrastructure\Helpers\RepositoryPaginationResponse;
use App\Models\Recipe;

class RecipeRepository
{
    public function getPaginated(int $page = 1, int $perPage = 10): RepositoryPaginationResponse
    {
        $count = Recipe::count();
        $data = Recipe::offset($page * $perPage - $perPage)->limit($perPage)->get();

        return new RepositoryPaginationResponse($data, $count, $perPage);
    }
}
