<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('metering_facility', function (Blueprint $table) {
            $table->id('id_metering_facility');
            $table->string('facility', 50)->nullable();
            $table->string('project', 50)->nullable();
            $table->string('section', 50)->nullable();
            $table->string('device', 50)->nullable();
            $table->string('device_name', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metering_facility');
    }
};
