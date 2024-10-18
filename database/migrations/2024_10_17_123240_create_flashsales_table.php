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
        Schema::create('flashsales', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->bigInteger('original_price');
            $table->bigInteger('discount_price');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('stock');
            $table->boolean('status')->default(value:1);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flashsales');
    }
};
