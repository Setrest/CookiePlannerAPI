<?php

namespace App\Domain\Recipe\API\Query;

use App\Domain\Recipe\Datasources\RecipeDataSource;
use App\Models\Recipe;

class GetRecipeForUserQueryApi
{
    public function __construct(private RecipeDataSource $datasource)
    {}

    public function call(int $id, int $userId): Recipe
    {
        return $this->datasource->byIdForUser($id, $userId)
            ->first();
    }
}
