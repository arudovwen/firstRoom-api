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
        Schema::create('room_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id");
            $table->string("room_cost")->nullable();
            $table->string("cost_duration")->nullable();
            $table->string("room_size")->nullable();
            $table->boolean("amenities_ensuite")->nullable();
            $table->boolean("furnishings")->nullable();
            $table->string("security_deposits")->nullable();
            $table->string("min_stay")->nullable();
            $table->string("max_stay")->nullable();
            $table->boolean("short_term_let")->nullable();
            $table->string("short_term_let_duration")->nullable();
            $table->boolean("reference_required")->nullable();
            $table->boolean("bills_included")->nullable();
            $table->boolean("bills_included")->nullable();
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
        Schema::dropIfExists('room_information');
    }
};
