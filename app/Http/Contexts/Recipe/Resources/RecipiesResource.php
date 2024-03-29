<?php

namespace App\Http\Contexts\Recipe\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipiesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'ccal' => $this->ccal,
            'time' => $this->time
        ];
    }
}
