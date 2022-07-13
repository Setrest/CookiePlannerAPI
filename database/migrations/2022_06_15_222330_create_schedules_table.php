<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\Mealtime;
use App\Models\Recipe;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('mealtime_id')->nullable();
            $table->date('date');
            $table->timestamps();

            $table->foreign('recipe_id')->references('id')->on(DH::getTableNameByModel(Recipe::class))->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on(DH::getTableNameByModel(User::class))->onDelete('cascade');
            $table->foreign('mealtime_id')->references('id')->on(DH::getTableNameByModel(Mealtime::class))->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
