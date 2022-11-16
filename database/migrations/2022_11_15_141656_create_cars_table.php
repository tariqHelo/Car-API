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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //add summary data json column
            $table->json('summary')->nullable();
            //add car DNA json column
            $table->json('dna')->nullable();
            //add car exterior json column
            $table->json('exterior')->nullable();
            //add car Tires/Brakes json column
            $table->json('tires_brakes')->nullable();
            //add car Electronics
            $table->json('electronics')->nullable();
            //add Road Test json column
            $table->json('road_test')->nullable();
            //add images json column
            $table->json('images')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
