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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_categories_id');
            $table->string('name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('slug')->nullable();
            $table->text('desc')->nullable();
            $table->timestamps();

            $table->foreign('sub_categories_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
