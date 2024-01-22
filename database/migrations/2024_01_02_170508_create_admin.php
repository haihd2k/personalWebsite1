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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('password');
            $table->char('phone')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', [0, 1, 2])->default(0);
            $table->enum('status', [0, 1])->default(0);
            $table->string('email')->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->date('joining_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
