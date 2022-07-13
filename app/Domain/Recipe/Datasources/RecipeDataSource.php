<?php

namespace App\Domain\Recipe\Datasources;

use App\Infrastructure\Datasources\BaseDataSource;
use App\Models\Recipe;

class RecipeDataSource extends BaseDataSource
{
    public function __construct()
    {
        $this->setModel(Recipe::class);
    }
}