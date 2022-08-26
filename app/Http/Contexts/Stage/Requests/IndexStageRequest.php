<?php

namespace App\Http\Contexts\Stage\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\Recipe;

class IndexStageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'recipe_id' => 'required|integer|' . DH::getExistsRuleString(Recipe::class, 'id')
        ];
    }
}
