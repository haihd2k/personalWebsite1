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
        Schema::create('attribute_variables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_details_id');
            $table->unsignedBigInteger('attribute_values_id');
            $table->timestamps();

            $table->foreign('product_details_id')->references('id')->on('product_details');
            $table->foreign('attribute_values_id')->references('id')->on('attribute_values');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_variables');
    }
};
