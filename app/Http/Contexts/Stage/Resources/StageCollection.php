<?php

namespace App\Http\Contexts\Stage\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return StageResource::collection($this->collection);
    }
}
