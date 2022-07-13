<?php

namespace App\Providers\Services;

use App\Domain\Recipe\Contracts\Services\RecipeIngredientServiceInterface;
use App\Domain\Recipe\Contracts\Services\RecipeServiceInterface;
use App\Domain\Recipe\Services\RecipeIngredientService;
use App\Domain\Recipe\Services\RecipeService;
use Illuminate\Support\ServiceProvider;

class RecipeServicesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            RecipeServiceInterface::class,
            RecipeService::class
        );

        $this->app->bind(
            RecipeIngredientServiceInterface::class,
            RecipeIngredientService::class
        );
    }
}
