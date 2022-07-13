<?php

namespace App\Infrastructure\Helpers;

class ResponseHelper
{    
    public static function json($data, ?string $message = null, int $status = 200, array $headers = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status' => $status
        ], $status, $headers);
    }

    public static function error(string $message, int $status = 500)
    {
        return self::json(null, $message, $status);
    }
}
