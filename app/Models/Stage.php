<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stage extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    public $fillable = [
        'recipe_id', 'text', 'position'
    ];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
