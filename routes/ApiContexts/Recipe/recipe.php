<?php

use App\Http\Contexts\Recipe\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('recipe', RecipeController::class);
