<?php

namespace App\Domain\Recipe\Services;

use App\Domain\Recipe\Contracts\Services\RecipeIngredientServiceInterface;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;

class RecipeIngredientService implements RecipeIngredientServiceInterface
{
    public function merge(Recipe $recipe, Ingredient...$ingredients): int
    {
        $insertPayload = [];

        foreach ($ingredients as $ingredient) {
            $insertPayload[] = [
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient->id,
                'amount' => 1,
            ];
        }

        RecipeIngredient::insert($insertPayload);

        return count($ingredients);
    }
}
