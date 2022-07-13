<?php

namespace App\Http\Contexts\Schedule\Requests;

use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\Mealtime;
use App\Models\Recipe;
use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'recipe_id' => 'required|integer|' . DH::getExistsRuleString(Recipe::class, 'id'),
            'date' => 'required|date',
            'mealtime_id' => 'required|integer|' . DH::getExistsRuleString(Mealtime::class, 'id')
        ];
    }
}
