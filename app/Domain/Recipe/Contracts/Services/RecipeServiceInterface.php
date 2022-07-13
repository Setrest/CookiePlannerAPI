<?php

namespace App\Domain\Recipe\Contracts\Services;

use App\Models\Recipe;

interface RecipeServiceInterface
{
    public function create(array $attributes): Recipe;

    public function update(array $aatributes): Recipe;
}