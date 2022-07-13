<?php

namespace App\Http\Contexts\Registration\Requests;

use App\Infrastructure\Helpers\DatabaseHelper;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmailRegistrationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => "required|email|unique:" . DatabaseHelper::getTableNameByModel(User::class),
            'password' => 'required|string|min:6',
        ];
    }
}
