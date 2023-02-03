<?php

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
        Schema::create('new_flat_mates', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id");
            $table->boolean("smoking")->nullable();
            $table->string("gender")->nullable();
            $table->string("occupation")->nullable();
            $table->boolean("pets")->nullable();
            $table->string("age")->nullable();
            $table->string("language")->nullable();
            $table->string("nationality")->nullable();
            $table->string("sexual_orientation")->nullable();
            $table->json("interests")->nullable();
            $table->string("min_age")->nullable();
            $table->string("max_age")->nullable();
            $table->boolean("vegetarian_preferred")->nullable();
            $table->boolean("couples_welcome")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_flat_mates');
    }
};
