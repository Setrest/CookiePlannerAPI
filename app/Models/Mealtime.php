<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mealtime extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    public $fillable = [
        'name'
    ];

    public function recipes()
    {
        return $this->hasManyThrough(Recipe::class, Schedule::class, 'id', 'id', 'mealtime_id', 'recipe_id');
    }
}
