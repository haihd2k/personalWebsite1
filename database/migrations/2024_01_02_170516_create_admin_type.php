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
        Schema::create('admin_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->enum('admin_type', [0, 1, 2])->default(0);
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_type');
    }
};
