<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\RecipeIngredient;
use App\Models\Stage;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_recipe_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('recipe_ingredient_id');
            $table->unsignedBigInteger('stage_id');

            $table->foreign('recipe_ingredient_id')->references('id')->on(DH::getTableNameByModel(RecipeIngredient::class))->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on(DH::getTableNameByModel(Stage::class))->onDelete('cascade');

            $table->index(['recipe_ingredient_id', 'stage_id'], 'recipe_ingredient_id_stage_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stage_recipe_ingredients');
    }
};
