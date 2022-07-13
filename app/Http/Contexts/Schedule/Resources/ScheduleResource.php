<?php

namespace App\Http\Contexts\Schedule\Resources;

use App\Http\Contexts\Recipe\Resources\RecipeResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'recipe' => [
                'id' => $this->recipe->id,
                'title' => $this->recipe->title,
                'ccal' => $this->recipe->ccal,
                'time' => $this->recipe->time,
            ],
            'mealtime' => $this->mealtime ? [
                'id' => $this->mealtime->id,
                'name' => $this->mealtime->name,
            ] : null,
            'date' => Carbon::parse($this->date)->format('d.m.Y'),
        ];
    }
}
