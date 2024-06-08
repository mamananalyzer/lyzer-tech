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
        Schema::create('hse_hazops', function (Blueprint $table) {
            $table->id('id_hazops');
            $table->string('node');
            $table->string('deviation');
            $table->string('cause');
            $table->string('consequence');
            $table->string('safeguards');
            $table->string('actions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hse_hazops');
    }
};
