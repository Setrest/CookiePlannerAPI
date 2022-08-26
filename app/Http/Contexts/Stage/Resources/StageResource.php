<?php

namespace App\Http\Contexts\Stage\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'text' => $this->text
        ];
    }
}