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
        Schema::create('user_edus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_applicable')->default(false);
            $table->string('institute_name')->nullable();
            $table->string('board')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('result')->nullable();
            $table->string('group_or_department')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('student_type')->nullable();
            $table->string('ref_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_edus');
    }
};
