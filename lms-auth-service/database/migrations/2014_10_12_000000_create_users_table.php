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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile_no')->uniqid();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->boolean('is_locked')->default(false);
            $table->tinyInteger('type')->default(5)->comment('1:superadmin, 2:employee, 5:student');
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
