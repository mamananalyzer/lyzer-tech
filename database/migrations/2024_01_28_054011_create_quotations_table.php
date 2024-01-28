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
        Schema::create('quotation', function (Blueprint $table) {
            $table->id('id_quotation');
            $table->string('quotNumber');
            $table->string('project');
            $table->string('customer');
            $table->float('amount');
            $table->string('sales');
            $table->string('status');
            $table->string('paidby');
            $table->string('brand');
            $table->string('type');
            $table->string('detail');
            $table->integer('qty');
            $table->float('total');
            $table->float('discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
