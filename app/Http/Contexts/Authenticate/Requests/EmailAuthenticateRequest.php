<?php

namespace App\Http\Contexts\Authenticate\Requests;

use App\Infrastructure\Helpers\DatabaseHelper;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class EmailAuthenticateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|' . DatabaseHelper::getExistsRuleString(User::class, 'email'),
            'password' => 'required|string'
        ];
    }
}
