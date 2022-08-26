<?php

namespace App\Domain\Stage\Datasources;

use App\Infrastructure\Datasources\BaseDataSource;
use App\Models\Stage;

class StageDataSource extends BaseDataSource
{
    public function __construct()
    {
        $this->setModel(Stage::class);
    }

    public function byRecipe(int $recipeId)
    {
        $this->source->where('recipe_id', $recipeId);
        return $this;
    }
}
