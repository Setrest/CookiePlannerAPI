<?php

namespace App\Domain\Recipe\Services;

use App\Domain\Recipe\Contracts\Services\RecipeServiceInterface;
use App\Models\Recipe;

class RecipeService implements RecipeServiceInterface
{
    public function create(array $attributes): Recipe
    {
        return Recipe::create($attributes);
    }
}
