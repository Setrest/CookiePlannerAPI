<?php

namespace App\Domain\Recipe\Handlers;

use App\Domain\Recipe\Contracts\Services\RecipeIngredientServiceInterface;
use App\Domain\Recipe\Contracts\Services\RecipeServiceInterface;
use App\Models\Recipe;
use App\Models\User;

class EditRecipeHandler
{
    public function __construct(private RecipeServiceInterface $recipeService, private RecipeIngredientServiceInterface $recipeIngredientService)
    {}

    public function handle(User $user, string $title, int $ccal, int $time, array $ingredientIds): Recipe
    {
        $this->recipeService->update();
    }
}
