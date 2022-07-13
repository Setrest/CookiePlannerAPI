<?php

use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->unsignedInteger('recipe_id');
            $table->unsignedInteger('ingredient_id');
            $table->unsignedDouble('amount');

            $table->primary(['recipe_id', 'ingredient_id']);

            $table->foreign('recipe_id')->references('id')->on(DH::getTableNameByModel(Recipe::class))->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on(DH::getTableNameByModel(Ingredient::class))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredients');
    }
};
