<?php

use App\Infrastructure\Helpers\DatabaseHelper as DH;
use App\Models\User;
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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('ccal')->unsigned();
            $table->integer('time')->unsigned();
            $table->unsignedBigInteger('created_by_id');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('created_by_id')->references('id')->on(DH::getTableNameByModel(User::class))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
