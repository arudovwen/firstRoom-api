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
        Schema::create('property_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id");
            $table->json("property_images")->nullable();
            $table->string("rooms_for_rent")->nullable();
            $table->string("type_of_property")->nullable();
            $table->json("amenities")->nullable();
            $table->string("no_of_beds")->nullable();
            $table->string("present_occupants")->nullable();
            $table->string("property_postcode")->nullable();
            $table->string("property_address")->nullable();
            $table->string("property_poster")->nullable();
            $table->string("property_area")->nullable();
            $table->boolean("shared_living_room")->default(false);
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
        Schema::dropIfExists('property_information');
    }
};
