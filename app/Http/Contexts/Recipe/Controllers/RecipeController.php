<?php

namespace App\Http\Contexts\Recipe\Controllers;

use App\Domain\Recipe\Query\GetRecipeQuery;
use App\Domain\Recipe\Handlers\CreateRecipeHandler;
use App\Http\Contexts\Recipe\Requests\CreateRecipeRequest;
use App\Http\Contexts\Recipe\Resources\RecipeResource;
use App\Http\Controller;
use App\Infrastructure\Helpers\ResponseHelper as RH;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function store(CreateRecipeRequest $request, CreateRecipeHandler $handler)
    {
        $payload = $request->only('title', 'ccal', 'time');
        $payload['user'] = Auth::user();
        $payload['ingredientIds'] = $request->get('ingredients');

        $recipe = $handler->handle(...$payload);
        return RH::json(['id' => $recipe->id], 'Recipe created', 201);
    }

    public function show(Request $request, GetRecipeQuery $query)
    {
        $recipe = $query->get((int) $request->recipe);
        return RH::json(new RecipeResource($recipe));
    }

    public function edit()
    {
        return RH::json();
    }
}
