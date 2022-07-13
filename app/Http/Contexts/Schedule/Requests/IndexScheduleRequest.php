<?php

namespace App\Http\Contexts\Schedule\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexScheduleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'from_date' => 'required|date',
            'to_date' => 'required|date'
        ];
    }
}
