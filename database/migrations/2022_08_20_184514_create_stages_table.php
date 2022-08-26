<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\Recipe;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id')->index('recipe_id_idx');
            $table->unsignedSmallInteger('position');
            $table->text('text');

            $table->softDeletes();

            $table->foreign('recipe_id')->references('id')->on(DH::getTableNameByModel(Recipe::class))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
};
