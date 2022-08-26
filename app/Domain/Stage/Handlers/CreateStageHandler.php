<?php

namespace App\Domain\Stage\Handlers;

use App\Domain\Recipe\API\Query\GetRecipeForUserQueryApi;
use App\Domain\Shared\Exceptions\NotFoundException;
use App\Domain\Stage\Contracts\Services\StageServiceInterface;
use App\Domain\Stage\Datasources\StageDataSource;
use App\Models\Stage;
use App\Models\User;

class CreateStageHandler
{
    public function __construct(private StageServiceInterface $stageService, private GetRecipeForUserQueryApi $getRecipeForUserQueryApi, private StageDataSource $datasource)
    {}

    public function call(User $user, int $recipeId, string $text): Stage
    {
        $recipe = $this->getRecipeForUserQueryApi->call($recipeId, $user->id);

        if (!$recipe) {
            throw new NotFoundException('Recipe not found!');
        }

        $lastPosition = $this->datasource->byRecipe($recipeId)->count();

        return $this->stageService->create([
            'recipe_id' => $recipeId,
            'text' => $text,
            'position' => $lastPosition + 1
        ]);
    }
}
