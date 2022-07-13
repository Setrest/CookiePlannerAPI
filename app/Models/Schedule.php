<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    public $fillable = [
        'recipe_id', 'user_id', 'date', 'mealtime_id'
    ];

    // public $hidden = ['deleted'];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function mealtime(): BelongsTo
    {
        return $this->belongsTo(Mealtime::class);
    }
}
