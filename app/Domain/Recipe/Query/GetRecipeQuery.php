<?php

namespace App\Domain\Recipe\Query;

use App\Domain\Recipe\Datasources\RecipeDataSource;

class GetRecipeQuery
{
    public function __construct(private RecipeDataSource $datasource)
    {}

    public function get(int $id)
    {
        return $this->datasource
            ->byId($id)
            ->with('ingredients')
            ->first();
    }
}
