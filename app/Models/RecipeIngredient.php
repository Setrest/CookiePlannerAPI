<?php

namespace App\Models;

use App\Infrastructure\Helpers\CastsHelper;
use App\Models\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public $fillable = [
        'ingredient_id', 'recipe_id', 'amount'
    ];

    protected $casts = [
        'amount' => CastsHelper::FLOAT
    ];
}
