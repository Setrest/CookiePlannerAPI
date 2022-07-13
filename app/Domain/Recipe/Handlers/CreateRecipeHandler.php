<?php

namespace App\Domain\Recipe\Handlers;

use App\Domain\Recipe\Contracts\Services\RecipeIngredientServiceInterface;
use App\Domain\Recipe\Contracts\Services\RecipeServiceInterface;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDOException;

class CreateRecipeHandler
{
    public RecipeServiceInterface $recipeService;
    public RecipeIngredientServiceInterface $recipeIngredientService;

    public function __construct(RecipeServiceInterface $recipeService, RecipeIngredientServiceInterface $recipeIngredientService)
    {
        $this->recipeService = $recipeService;
        $this->recipeIngredientService = $recipeIngredientService;
    }

    public function handle(User $user, string $title, int $ccal, int $time, array $ingredientIds): Recipe
    {
        try {
            DB::beginTransaction();

            $recipe = $this->recipeService->create([
                'created_by_id' => $user->id,
                'title' => $title,
                'ccal' => $ccal,
                'time' => $time,
            ]);

            $ingredients = Ingredient::whereIn('id', $ingredientIds)->get();

            $this->recipeIngredientService->merge($recipe, ...$ingredients);

            DB::commit();
        } catch (PDOException $e) {
            DB::rollBack();
            throw $e;
        }

        return $recipe;
    }
}
