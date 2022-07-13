<?php

namespace App\Http\Contexts\Recipe\Requests;

use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Foundation\Http\FormRequest;

class CreateRecipeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:50|unique:' . DH::getTableNameByModel(Recipe::class),
            'ccal' => "required|integer|min:10",
            'time' => 'required|integer|min:0',
            'ingredients' => 'required|array|min:2',
            'ingredients.*' => 'integer|' . DH::getExistsRuleString(Ingredient::class, 'id')
        ];
    }
}
