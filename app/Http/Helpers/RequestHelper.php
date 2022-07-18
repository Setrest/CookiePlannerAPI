<?php

namespace App\Http\Helpers;

class RequestHelper
{
    public static function paginationRules(bool $page = true, bool $perPage = true): array
    {
        $rules = [
            'page' => 'int|min:0',
            'per_page' => 'int|min:5'
        ];

        if (!$page) {
            unset($rules['page']);
        } else if (!$perPage) {
            unset($rules['per_page']);
        }

        return $rules;
    }
}