<?php

namespace App\Http\Contexts\Schedule\Resources;

use App\Http\Shared\PaginationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ScheduleResource::collection($this->collection);
    }
}
