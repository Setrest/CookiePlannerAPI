<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'title', 'ccal', 'time', 'created_by_id',
    ];

    public $hidden = ['deleted_at'];

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, RecipeIngredient::class)->withPivot('amount as amount');
    }
}
