<?php

namespace App\Http\Contexts\Registration\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nickname' => $this->nickname,
        ];
    }
}
