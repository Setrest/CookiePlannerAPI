<?php

namespace App\Domain\Recipe\Contracts\Services;

use App\Models\Ingredient;
use App\Models\Recipe;

interface RecipeIngredientServiceInterface
{
    public function merge(Recipe $recipe, Ingredient...$ingredients): int;
}
