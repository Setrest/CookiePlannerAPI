<?php

namespace App\Domain\Stage\Query;

use App\Domain\Stage\Datasources\StageDataSource;
use App\Models\User;

class GetStagesForRecipeQuery
{
    public function __construct(private StageDataSource $datasource)
    {}

    public function call(User $user, int $recipeId)
    {
        $stages = $this->datasource
            ->byRecipe($recipeId)
            ->orderBy('position')
            ->get();

        return $stages;
    }
}