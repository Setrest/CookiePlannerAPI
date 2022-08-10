<?php

namespace App\Http\Contexts\Recipe\Requests;

use App\Http\Helpers\RequestHelper;
use Illuminate\Foundation\Http\FormRequest;

class IndexRecipesRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'min_ccal' => 'nullable|int|min:0',
            'max_ccal' => 'nullable|int|min:0'
        ];

        return array_merge($rules, RequestHelper::paginationRules(perPage: false));
    }
}
