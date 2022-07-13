<?php

namespace Database\Seeders\Fakes;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsFakeSeeder extends Seeder
{
    public function run()
    {
        Ingredient::factory()->count(2)->create();
    }
}
