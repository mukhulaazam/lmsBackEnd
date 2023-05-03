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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_builder_id')->constrained()->onDelete('cascade');
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_free')->nullable()->default(false);
            $table->boolean('is_preview')->nullable()->default(false);
            $table->boolean('is_published')->nullable()->default(false);
            $table->integer('order')->nullable()->default(0);
            $table->boolean('is_custom_ordering')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
