<?php

namespace App\Http\Resources\Shared;

use Illuminate\Http\Resources\Json\JsonResource;

class FileImage extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'extension' => $this->extension,
            'full_path' => $this->full_path,
            'mime' => $this->mime
        ];   
    }
}