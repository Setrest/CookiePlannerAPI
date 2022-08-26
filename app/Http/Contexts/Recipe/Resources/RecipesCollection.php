<?php

namespace App\Http\Contexts\Recipe\Resources;

use App\Http\Shared\PaginationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipesCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return new PaginationResource($this);
    }
}
