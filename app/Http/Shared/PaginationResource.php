<?php

namespace App\Http\Shared;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'items' => $this->collection,
            'paginator' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ],
        ];
    }
}
