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
            $table->string('name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreignId('engine_transmission_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('interior_electicals_air_conditioner_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('steering_suspension_brake_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('car_space_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wheel_id')->nullable()->constrained()->onDelete('cascade');
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
