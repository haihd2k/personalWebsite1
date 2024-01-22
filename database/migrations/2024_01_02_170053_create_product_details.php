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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('brand_id');
            $table->char('code')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('count_orders')->nullable();
            $table->enum('status', [0, 1, 2])->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('discount_id')->references('id')->on('discount');
            $table->foreign('brand_id')->references('id')->on('brand');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
